<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'transaction_id',
        'bank_ref',
        'amount',
        'description',
        'status',
        'bank_response',
        'payment_method',
        'paid_at'
    ];

    protected $casts = [
        'bank_response' => 'array',
        'paid_at' => 'datetime',
        'amount' => 'decimal:0'
    ];

    /**
     * Get the enrollment associated with the transaction.
     */
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    /**
     * Scope a query to only include completed transactions.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope a query to only include pending transactions.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include failed transactions.
     */
    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }
}
