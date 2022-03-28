<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use App\Models\Server;
use App\Models\Version;
use Illuminate\Support\Facades\Hash;
class ServerController extends Controller
{
    //
    public function server() {
        $list = Server::find(1);
        $versions = Version::all();
        return view('server.diceroll', compact('list', 'versions'));
    }

    public function changeVersion($id) {
        $version = Version::find($id);
        return view('server.change-version', compact('version'));
    }

    public function postServer(Request $request) {
        $this->validate($request,[
            'diceroll' => 'required|numeric|min:0|max:100',
        ], [
            'diceroll.required' => 'Giá trị diceroll từ 0 -> 100',
            'diceroll.numeric' => 'DiceRoll sai định dạng',
            'diceroll.min' => 'Giá trị diceroll từ 0 -> 100',
            'diceroll.max' => 'Giá trị diceroll từ 0 -> 100',
        ]);

        $server = Server::find(1);
        if($server == null) {
            $server = new Server();
            $server->diceroll = $request->diceroll;
            $server->save();
        } else {
            $server->diceroll = $request->diceroll;
            $server->update();
        }
        return redirect()->back()->with('thongbao', "Thay đổi DiceRoll thành công!");
    }

    public function postVersion(Request $request) {
        $this->validate($request,[
            'version' => 'required|unique:version,version',
        ], [
            'version.required' => 'Hãy nhập Version',
            'version.unique' => 'Version này đã tồn tại',
        ]);

        $version = new Version;
        $version->version = $request->version;
        $version->save();
        return redirect()->back()->with('thongbao', "Thêm mới version '".$version->version."' thành công!");
    }

    public function editVersion(Request $request, $id) {
        $this->validate($request,[
            'version' => 'required|unique:version,version,'.$id,
        ], [
            'version.required' => 'Hãy nhập Version',
            'version.unique' => 'Version này đã tồn tại',
        ]);

        $version = Version::find($id);
        $version->version = $request->version;
        $version->update();
        return redirect()->route('server')->with('thongbao', "Thay đổi version thành công!");
    }

    public function deleteVersion($id) {
        $version = Version::find($id);
        if($version == null) return redirect()->back()->with('loi', "Không tìm thấy version này này");
        $version->delete();
        return redirect()->back()->with('thongbao', "Xoá verion '".$version->version."' thành công!");
    }
}
