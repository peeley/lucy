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

    protected $visible = [
        'text',
        'icon',
        'color',
        'pivot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
