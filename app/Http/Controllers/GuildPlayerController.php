<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GuildPlayer;
use Illuminate\Support\Facades\Hash;
class GuildPlayerController extends Controller
{
    //
    public function index() {
        $list = GuildPlayer::orderBy('id','desc')->get();
        return view('guild.guild-player', compact('list'));
    }

    public function add() {
        return view('guild.add-guild');
    }

    public function edit($id) {
        $guildPlayer = GuildPlayer::find($id);
        if($guildPlayer == null) return redirect()->back()->with('loi', "Không tìm thấy Player này");
        return view('guild.edit-guild-player', compact('guild'));
    }

    public function postAdd(Request $request) {
        $this->validate($request,[
            'guildId' => 'required',
            'address' => 'required|unique:guildPlayers,Address',
            'avatarAddress' => 'required',
            'rank' => 'min:0|numeric',
        ], [
            'guildId.required' => 'Hãy chọn Guild',
            'address.required' => 'Địa nhập địa chỉ',
            'avatarAddress.required' => 'Địa nhập địa chỉ avatar',
            'address.unique' => 'Địa chỉ này đã trong 1 guild khác',
            'rank.min' => 'Giá trị rank nhỏ nhất: 0',
            'rank.numeric' => 'Giá trị rank sai định dạng',
        ]);

        $player = new GuildPlayer;
        $player->GuildId = $request->guildId;
        $player->Address = $request->address;
        $player->AvatarAddress = $request->avatarAddress;
        $player->Rank = $request->rank;
        $player->save();
        return redirect()->route('guild-player')->with('thongbao', "Thêm mới địa chỉ '".$player->Address."' thành công!");
    }

    public function postEdit(Request $request, $id) {
        $this->validate($request,[
            'address' => 'required|unique:players,Address,'.$id,
            'endblock' => 'required|numeric|min:0',
            'arenabanner' => 'min:0|numeric',
            'arenaicon' => 'min:0|numeric',
            'swordskin' => 'min:0|numeric',
            'friendviewskin' => 'min:0|numeric',
        ], [
            'address.required' => 'Hãy nhập địa chỉ',
            'address.unique' => 'Địa chỉ này đã tồn tại',
            'endblock.required' => 'Hãy nhập End block',
        ]);

        $player = Player::find($id);
        if($player == null) return redirect()->back()->with('loi', "Không tìm thấy địa chỉ này này");
        $player->Address = $request->address;
        $player->IsBanned = 0;
        $player->IsPremium = $request->premium;
        $player->IsIgnoringMessage = $request->ignoring;
        $player->IsProtected = $request->protected;
        $player->PremiumEndBlock = $request->endblock;
        $player->ArenaBanner = $request->arenabanner;
        $player->ArenaIcon = $request->arenaicon;
        $player->SwordSkin = $request->swordskin;
        $player->FriendViewSkin = $request->friendviewskin;
        $player->DiscordId = $request->discordid;
        $player->Info = $request->info;
        $player->save();
        return redirect()->back()->with('thongbao', "Sửa địa chỉ thành công!");
    }

    public function delete($id) {
        $player = Player::find($id);
        if($player == null) return redirect()->back()->with('loi', "Không tìm thấy địa chỉ này này");
        $player->delete();
        return redirect()->back()->with('thongbao', "Xoá địa chỉ '".$player->Address."' thành công!");
    }
}
