<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // Validate file
            $validator = validator(['upload' => $file], [
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => [
                        'message' => $validator->errors()->first()
                    ]
                ]);
            }

            try {
                // Generate unique filename
                $fileName = uniqid() . '_' . $file->getClientOriginalName();

                // Store file
                $file->move(public_path('uploads'), $fileName);

                $url = asset('uploads/' . $fileName);

                // Return response for CKEditor 4
                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $fileName,
                    'url' => $url,
                    'error' => [
                        'message' => ''
                    ]
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'uploaded' => 0,
                    'error' => [
                        'message' => 'Error uploading file: ' . $e->getMessage()
                    ]
                ]);
            }
        }

        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => 'No file uploaded.'
            ]
        ]);
    }
}
