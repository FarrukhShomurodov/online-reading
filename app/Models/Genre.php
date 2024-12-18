<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_genres');
    }

    public function top(): HasMany
    {
        return $this->hasMany(TopGenre::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
