<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsCategory extends Model
{
    protected $fillable = ['name'];

    protected $casts = ['name' => 'array'];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
