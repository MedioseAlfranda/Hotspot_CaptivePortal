<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\UserAccount as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AuthenticationOtp extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(UserAccount::class, 'user_id');
    }
}
