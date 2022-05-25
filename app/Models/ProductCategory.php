<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table="product_categories";
    protected $fillable=[
        'category_name',
        'slug',
        'gambar',
    ];

    public function product_category_details(){
        return $this->hasMany('App\Models\ProductCategoryDetail', 'category_id');
    }
}
