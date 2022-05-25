<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table="transactions";
    protected $fillable=[
        'timeout',
        'address',
        'order_notes',
        'regency',
        'province',
        'postal_code',
        'total',
        'shipping_cost',
        'shipping_service',
        'shipping_etd',
        'weight',
        'user_id',
        'courier_id',
        'proof_of_payment',
        'status',
        'is_review',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id';
    protected $casts = ['timeout'=> 'datetime','total' => 'integer', 'shipping_cost' => 'integer', 'weight' => 'integer'];
    

    public function transaction_details(){
        return $this->hasMany('App\Models\TransactionDetail');
    }

    public function product_reviews(){
        return $this->hasMany('App\Models\ProductReview');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
