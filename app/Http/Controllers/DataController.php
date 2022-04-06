<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Version;
use App\Models\Server;
use App\Models\Guild;
use App\Models\GuildPlayer;

class DataController extends Controller
{
    //
    public function get(Request $request) {
        $respone = [];

        $version = Version::all();
        $guilds = Guild::all();
        $guildPlayers = GuildPlayer::all();
        $server = Server::find(1);
        if($server == null) {
            $server = new Server;
            $server->diceroll = 1;
        }
        $ver = [];
        foreach($version as $item) {
            $ver[] = $item->version;
        }
        $respone["AllowedVersions"] = $ver;
        $respone["DiceRoll"] = $server->diceroll;
        $respone["Guilds"] = $guilds;  
        $respone["GuildPlayers"] = $guildPlayers;  
        $respone["Players"] = Player::all();

        return response($respone, 200);
    }
}
