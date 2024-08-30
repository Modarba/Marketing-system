<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    use HasFactory;
    public function friend()
    {
        return $this->belongsToMany(Friend::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function prodcut()
    {
        return $this->hasMany(Product::class);
    }
}
