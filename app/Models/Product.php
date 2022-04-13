<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
        'product_name',
        'price',
        'desc',
        'product_rate',
        'stock',
        'weight',
    ];
    protected $primaryKey = 'id';
    protected $casts = ['price' => 'integer', 'stock' => 'integer', 'weight' => 'integer', 'product_rate' => 'double'];
    

    public function product_category_details(){
        return $this->hasMany('App\Models\ProductCategoryDetail');
    }

    public function product_images(){
        return $this->hasMany('App\Models\ProductImage');
    }
}
