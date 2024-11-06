<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'name',
        'last_name',
        'text',
        'ratting',
        'is_view',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'is_view' => 'boolean',
    ];
}
