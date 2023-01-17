<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function toys()
    {
        return $this->hasMany(Toy::class);
    }

    protected $fillable = [
        'name',
        'age',
        'chip',
    ];
}
