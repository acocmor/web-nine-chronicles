<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class TestController extends Controller
{
    //
    public function get() {
        $respone = [];
        $respone["VersionID"] = "010029";
        $respone["DiceRoll"] = 2;
        $respone["Players"] = Player::all();

        return response($respone, 200);
    }
}
