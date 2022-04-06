<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'guilds';
    protected $hidden = [
        'id'
    ];

    public function guildPlayer() {
        return $this->hasMany('App\Models\GuildPlayer','GuildId');
    }
}