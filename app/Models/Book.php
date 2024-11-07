<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_category_id',
        'code',
        'title',
        'is_loaned'
    ];

    protected $with = [
        'bookCategory'
    ];

    public function bookCategory(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }
}
