<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserSettings;
use App\Models\BoardModel;
use App\Models\WordModel;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user settings associated with the user.
     * 
     * @var array
     */

    public function settings()
    {
        return $this->hasOne(UserSettings::class);
    }

    public function boards()
    {
        return $this->hasMany(BoardModel::class);
    }

    public function words()
    {
        return $this->hasMany(WordModel::class);
    }

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }
}
