<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use Illuminate\Support\Facades\Hash;
class PlayerController extends Controller
{
    //
    public function dashboard() {
        $list = Player::orderBy('id','desc')->get();
        return view('index', compact('list'));
    }

    public function password() {
        return view('password');
    }

    public function add() {
        return view('add');
    }

    public function edit($id) {
        $player = Player::find($id);
        if($player == null) return redirect()->route('index')->with('loi', "Không tìm thấy địa chỉ này này");
        return view('edit', compact('player'));
    }

    public function login() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Hãy nhập username',
            'password.required' => 'Hãy nhập password',
        ]);

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password], false)) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('thongbao', 'Đăng nhập thất bại!');
        }
    }

    public function postAdd(Request $request) {
        $this->validate($request,[
            'address' => 'required|unique:players,Address',
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

        $player = new Player;
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
        return redirect()->route('index')->with('thongbao', "Thêm mới địa chỉ '".$player->Address."' thành công!");
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

    public function postPassword(Request $request) {
        $user = Auth::user();

        if(!(Hash::check($request->password, $user->password))) {
    		return redirect()->back()->with('loi', 'Sai mật khẩu cũ!');

    	} else if(strcmp($request->password, $request->newPassword) == 0){
    		return redirect()->back()->with('loi', 'Mật khẩu mới trùng mật khẩu cũ!');
    	} else if(strcmp($request->newPassword, $request->confirmPassword) == 0){
    		//change password
    	$user->password = bcrypt($request->newPassword);
    	$user->update();
        return redirect()->back()->with('thongbao', 'Thay đổi mật khẩu thành công!');
    	}
        return redirect()->back()->with('loi', 'Xác nhận mật khẩu mới sai!');
    	
    }
}
