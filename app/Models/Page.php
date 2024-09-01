<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=['name','image','description','product_type','user_id'];

    public function user()
    {
        return $this->belongsToMany(User::class,'user_page_pivot');

    }
    public function product()
    {
        return $this->belongsToMany(Product::class,'page_product');
    }
}
