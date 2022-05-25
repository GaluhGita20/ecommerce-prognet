<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table="carts";
    protected $fillable=[
        'product_id',
        'user_id',
        'qty',
        'sub_total',
        'status'
    ];
    protected $primaryKey = 'id';
    protected $casts = ['qty' => 'integer', 'sub_total' => 'integer'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
