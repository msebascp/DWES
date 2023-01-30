<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function pet()
    {
        return $this->hasOne(Pet::class);
    }

    protected $fillable = [
        'name',
        'phone',
        'email',
        'age',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
