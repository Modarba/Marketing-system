<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function page()
    {
        return $this->belongsToMany(Page::class);
    }
    public function friend()
    {
        return $this->belongsToMany(Friend::class);
    }
}
