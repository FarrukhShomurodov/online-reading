<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Promotion extends Model
{
    protected $fillable = [
        'title',
        'start_time',
        'description',
        'end_time',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
