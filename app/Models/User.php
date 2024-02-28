<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'active',
        'coordinator_id',
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

    public function isSeller(){
        return $this->level == 'seller' ? true : false;
    }

    public function isCoordinator(){
        return $this->level == 'coordinator' ? true : false;
    }

    public function isAdmin(){
        return $this->level == 'admin' ? true : false;
    }

    public function isMarketing() {
        return $this->level ==  'marketing' ? true : false;
    }

    public function sellers() {
        return $this->hasMany(User::class, 'coordinator_id');
    }

    public function coordinator() {
        return $this->hasOne(User::class, 'id', 'coordinator_id');
    }
}
