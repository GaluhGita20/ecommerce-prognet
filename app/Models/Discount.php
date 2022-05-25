<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table="discounts";
    protected $fillable=[
        'product_id',
        'percentage',
        'start',
        'end',
        'status_aktif'
    ];
    protected $primaryKey = 'id';
    protected $casts = ['percentage' => 'integer', 'start' => 'datetime', 'end' => 'datetime',];

    public function product(){
        return $this->hasOne(Product::class);
    }
}
