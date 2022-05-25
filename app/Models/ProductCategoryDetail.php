<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryDetail extends Model
{
    use HasFactory;
    protected $table="product_category_details";
    protected $fillable=[
        'product_id',
        'category_id',
    ];

    public function product(){
        return $this->hasOne(Product::class);
    }

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
}
