<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserSettings extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * to do: make more user settings after demo
     * @var array
     */
        protected $fillable = [
        'guided_use_toggle',
        'idle_threshold',
        'audio_level',
        'user_id',
    ];

    /**
     * Get the user who owns these settings.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
