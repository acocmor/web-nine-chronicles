<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GuildPlayer;
use App\Models\Guild;
use Illuminate\Support\Facades\Hash;
class GuildPlayerController extends Controller
{
    //
    public function index() {
        $list = GuildPlayer::orderBy('id','desc')->get();
        return view('guild.guild-player', compact('list'));
    }

    public function add($id) {
        $guild = Guild::find($id);
        if($guild == null) return redirect()->back()->with('loi', "Không tìm thấy Guild này");
        return view('guild.add-guild-player', compact('guild'));
    }

    public function edit($id) {
        $player = GuildPlayer::find($id);
        if($player == null) return redirect()->back()->with('loi', "Không tìm thấy Player này");

        $guild = Guild::where('Tag', '=', $player->Guild)->take(1)->get();
        if($guild == null) return redirect()->back()->with('loi', "Không tìm thấy Guild của Player này");

        $listGuild = Guild::all();
        return view('guild.edit-guild-player', compact('player', 'guild', 'listGuild'));
    }

    public function postAdd(Request $request, $id) {
        $guild = Guild::find($id);
        if($guild == null) return redirect()->back()->with('loi', "Không tìm thấy Guild này");
        $this->validate($request,[
            'address' => 'required|unique:guildPlayers,Address',
            'avatarAddress' => 'required',
            'rank' => 'min:0|numeric',
        ], [
            'address.required' => 'Địa nhập địa chỉ',
            'avatarAddress.required' => 'Địa nhập địa chỉ avatar',
            'address.unique' => 'Địa chỉ này đã trong 1 guild khác',
            'rank.min' => 'Giá trị rank nhỏ nhất: 0',
            'rank.numeric' => 'Giá trị rank sai định dạng',
        ]);

        $player = new GuildPlayer;
        $player->Guild = strtoupper($guild->Tag);
        $player->Address = $request->address;
        $player->AvatarAddress = $request->avatarAddress;
        $player->Rank = $request->rank;
        $player->save();
        return redirect()->back()->with('thongbao', "Thêm mới Guild player'".$player->Address."' thành công!");
    }

    public function postEdit(Request $request, $id) {
        $this->validate($request,[
            'guild' => 'required',
            'address' => 'required|unique:guildPlayers,Address,'.$id,
            'avatarAddress' => 'required',
            'rank' => 'min:0|numeric',
        ], [
            'guild.required' => 'Hãy chọn guild cho player',
            'address.required' => 'Địa nhập địa chỉ',
            'avatarAddress.required' => 'Địa nhập địa chỉ avatar',
            'address.unique' => 'Địa chỉ này đã trong 1 guild khác',
            'rank.min' => 'Giá trị rank nhỏ nhất: 0',
            'rank.numeric' => 'Giá trị rank sai định dạng',
        ]);

        $guild = Guild::where('Tag', '=', $request->guild)->get();
        if($guild == null) return redirect()->back()->with('loi', "Không tìm thấy Guild này");

        $player = GuildPlayer::find($id);
        if($player == null) return redirect()->back()->with('loi', "Không tìm Player này");

        if($player->Guild != $request->guild) {
            $player->Guild = strtoupper($request->guild);
        }
        $player->Address = $request->address;
        $player->AvatarAddress = $request->avatarAddress;
        $player->Rank = $request->rank;
        $player->update();
        return redirect()->back()->with('thongbao', "Sửa Guild Player thành công!");
    }

    public function delete($id) {
        $player = GuildPlayer::find($id);
        if($player == null) return redirect()->back()->with('loi', "Không tìm thấy player này");
        $player->delete();
        return redirect()->back()->with('thongbao', "Xoá guild player '".$player->Address."' thành công!");
    }
}
