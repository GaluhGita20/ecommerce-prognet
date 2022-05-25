<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_telp',
        'alamat',
        'profile_image',
        'status'
    ];
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function product_reviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function notifications(){
        return $this->morphMany(UserNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

    public function createNotifUser($type, $nt_type, $data)
    {
        $notif = new UserNotification();
        $notif->type = $type;
        $notif->notifiable_type = $nt_type;
        $notif->notifiable_id = $this->id;
        $notif->data = $data;
        $notif->save();
    }

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
