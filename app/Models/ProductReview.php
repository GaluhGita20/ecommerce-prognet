<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $table="product_reviews";
    protected $fillable=[
        'product_id',
        'user_id',
        'transaction_id',
        'rate',
        'content',
        'is_finish'
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function respond(){
        return $this->hasOne(Respond::class, 'review_id');
    }
}
