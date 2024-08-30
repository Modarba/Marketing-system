<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=['name','image','description','product_type'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
