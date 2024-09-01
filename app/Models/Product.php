<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable=['name','image','description','price'];
    use HasFactory;
    public function page()
    {
        return $this->belongsToMany(Page::class,'page_product');
    }
    public function friend()
    {
        return $this->belongsToMany(Friend::class);
    }
    public function invite()
    {
        return $this->belongsTo(invite::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class,'user_page_pivot');
    }
}
