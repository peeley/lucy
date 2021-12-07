<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordModel extends Model
{
    use HasFactory;

    protected $table = 'words';

    protected $fillable = [
        'text',
        'icon',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
