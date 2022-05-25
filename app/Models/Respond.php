<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    use HasFactory;
    protected $table="responds";
    protected $fillable=[
        'review_id',
        'admin_id',
        'content',
        'is_finish',
    ];

    public function product_review(){
        return $this->belongsTo(ProductReview::class, 'review_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
