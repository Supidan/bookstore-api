<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookLoan extends Model
{
    protected $fillable = [
        'customer_id',
        'book_id',
        'loan_start_date',
        'loan_end_date'
    ];

    protected $casts = [
        'loan_start_date' => 'datetime',
        'loan_end_date' => 'datetime'
    ];

    protected $with = [
        'customer',
        'book'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
