<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'array',
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_tags');
    }
}
