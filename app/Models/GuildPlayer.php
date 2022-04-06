<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuildPlayer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'guildplayers';
    protected $hidden = [
        'id',
        'GuildId'
    ];

    public function guild() {
        return $this->beLongsTo('App\Models\Guild','GuildId');
    }
}