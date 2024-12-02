<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasUlids;

    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'password' => 'string',
    ];

    protected $hidden = ['password'];
}
