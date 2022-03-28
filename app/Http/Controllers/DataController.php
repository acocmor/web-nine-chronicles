<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Version;
use App\Models\Server;

class DataController extends Controller
{
    //
    public function get(Request $request) {
        $respone = [];

        $version = Version::all();
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
        if($request->p != null && $request->p >= 1000000 && $request->p <= 8000000) {
            $respone["Guilds"] = [];  
        }
        $respone["Players"] = Player::all();

        return response($respone, 200);
    }
}
