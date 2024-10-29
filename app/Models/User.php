<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasUlids;
    use Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'phone_number',
        'sms_code',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sms_code' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
