<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table="transaction_details";
    protected $fillable=[
        'transaction_id',
        'product_id',
        'qty',
        'discount_id',
        'selling_price',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id';
    protected $casts = [ 'qty'=> 'integer','selling_price' => 'integer',];


    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
