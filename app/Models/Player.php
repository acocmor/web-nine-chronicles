<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'players';
    protected $casts = [
        'IsPremium' => 'boolean',
        'IsBanned' => 'boolean',
        'IsProtected' => 'boolean',
        'IsIgnoringMessage' => 'boolean',
    ];
    protected $hidden = [
        'id',
        'info',
    ];

}
