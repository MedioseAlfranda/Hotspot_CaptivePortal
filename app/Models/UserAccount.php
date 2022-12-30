<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\UserAccount as Authenticatable;
use Illuminate\Notifications\Notifiable;


class UserAccount extends Authenticatable{ 

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'user_id';
    protected $fillable = [
        
        'name',
        'tanggal_lahir',
        'tempat_lahir',
        'email',
        'provider_id',
        'photo_account',
        'handphone',
        'jenis_kelamin',
        'agama',
        'password',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function  Authenticationotp()
    {
        return $this->hasMany(AuthenticationOtp::class, 'user_id');
    }

    /**
     * customer
     *
     * @return void
     */
    public function MacAddress()
    {
        return $this->belongsTo(accessLogs::class);
    }
}



    

     








