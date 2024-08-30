<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function invite()
    {
        return $this->hasMany(invite::class);
    }
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
