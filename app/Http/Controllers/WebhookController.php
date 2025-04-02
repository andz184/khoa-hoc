<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WebhookController extends Controller
{
    public function handlePayment(Request $request)
    {
        // Log webhook data
        Log::info('Payment Webhook received:', $request->all());

        try {
            // Verify webhook signature if provided by bank
            if (!$this->verifyWebhookSignature($request)) {
                Log::error('Invalid webhook signature');
                return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 401);
            }

            // Extract transaction data
            $transactionData = $request->all();

            // Expected format from bank webhook:
            // {
            //     "transaction_id": "xxx",
            //     "amount": 2700000,
            //     "description": "KH123 - Nguyen Van A",
            //     "status": "success",
            //     "bank_ref": "xxx"
            // }

            // Parse enrollment ID from description
            preg_match('/KH(\d+)/', $transactionData['description'], $matches);
            if (empty($matches[1])) {
                Log::error('Could not parse enrollment ID from description', ['description' => $transactionData['description']]);
                return response()->json(['status' => 'error', 'message' => 'Invalid transaction description'], 400);
            }

            $enrollmentId = $matches[1];

            // Find enrollment
            $enrollment = Enrollment::find($enrollmentId);
            if (!$enrollment) {
                Log::error('Enrollment not found', ['id' => $enrollmentId]);
                return response()->json(['status' => 'error', 'message' => 'Enrollment not found'], 404);
            }

            // Verify amount matches
            if ($transactionData['amount'] != $enrollment->course->getCurrentPrice()) {
                Log::error('Amount mismatch', [
                    'expected' => $enrollment->course->getCurrentPrice(),
                    'received' => $transactionData['amount']
                ]);
                return response()->json(['status' => 'error', 'message' => 'Amount mismatch'], 400);
            }

            // Create or update transaction record
            $transaction = Transaction::updateOrCreate(
                [
                    'enrollment_id' => $enrollmentId,
                    'transaction_id' => $transactionData['transaction_id']
                ],
                [
                    'bank_ref' => $transactionData['bank_ref'],
                    'amount' => $transactionData['amount'],
                    'description' => $transactionData['description'],
                    'status' => 'completed',
                    'bank_response' => $transactionData,
                    'paid_at' => now()
                ]
            );

            // Update enrollment status
            $enrollment->status = 'completed';
            $enrollment->save();

            // Create user account
            $password = Str::random(10);
            $user = User::create([
                'name' => $enrollment->student_name,
                'email' => $enrollment->email,
                'password' => Hash::make($password),
                'role' => 'student'
            ]);

            // Attach course to user
            $user->courses()->attach($enrollment->course_id);

            // Send email with login credentials
            Mail::send('emails.enrollment_success', [
                'user' => $user,
                'password' => $password,
                'course' => $enrollment->course
            ], function($message) use ($user) {
                $message->to($user->email)
                        ->subject('Thông tin đăng nhập khóa học');
            });

            Log::info('Payment processed successfully', [
                'enrollment_id' => $enrollmentId,
                'transaction_id' => $transaction->id
            ]);

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('Error processing payment webhook', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => 'error', 'message' => 'Internal server error'], 500);
        }
    }

    private function verifyWebhookSignature(Request $request)
    {
        // Implement signature verification based on bank's requirements
        // This is just a placeholder - replace with actual verification logic
        $signature = $request->header('X-Signature');
        $payload = $request->getContent();
        $secret = config('services.bank.webhook_secret');

        // Example verification (replace with actual verification method)
        $expectedSignature = hash_hmac('sha256', $payload, $secret);
        return hash_equals($expectedSignature, $signature);
    }
}
