<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserReadBook extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
