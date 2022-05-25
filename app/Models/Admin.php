<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
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
        'role'
    ];

    public function notifications()
    {
        return $this->morphMany(AdminNotification::class, 'notifiable')->orderby('created_at', 'desc');
    }

    public function product_reviews(){
        return $this->hasMany(Respond::class);
    }

    public function createNotif($type, $nt_type, $data)
    {
        $notif = new AdminNontifications();
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
