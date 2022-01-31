<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $table = 'words';

    protected $fillable = [
        'text',
        'icon',
        'color',
    ];

    // Set default color to white
    protected $attributes = [
        'color' => '#FFFFFF'
    ];

    protected $visible = [
        'text',
        'icon',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
