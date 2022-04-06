<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guild;
use Illuminate\Support\Facades\Hash;
class GuildController extends Controller
{
    //
    public function index() {
        $list = Guild::orderBy('id','desc')->get();
        return view('guild.index', compact('list'));
    }

    public function add() {
        return view('guild.add-guild');
    }

    public function edit($id) {
        $guild = Guild::find($id);
        if($guild == null) return redirect()->back()->with('loi', "Không tìm thấy Guild này này");
        return view('guild.edit-guild', compact('guild'));
    }

    public function postAdd(Request $request) {
        $this->validate($request,[
            'tag' => 'required|digits:3|unique:guilds,Tag',
            'name' => 'required|unique:guilds,Name|min:1',
            'desc' => 'required',
            'minLevel' => 'min:0|numeric',
            'type' => 'numeric',
            'link' => 'required',
            'language' => 'required',
        ], [
            'tag.required' => 'Hãy nhập tên TAG',
            'tag.digits' => 'Độ dài tên TAG là: 3 ký tự',
            'tag.unique' => 'Tên TAG này đã tồn tại',
            'name.unique' => 'Tên GUILD này đã tồn tại',
            'name.required' => 'Hãy nhập tên GUILD',
            'desc.required' => 'Hãy nhập mô tả GUILD',
            'minLevel.min' => 'Thấp nhất 0',
            'minLevel.numeric' => 'Sai định dạng Min Level',
            'type.numeric' => 'Sai định dạng Type',
            'link.required' => 'Link không được để trống',
            'language.required' => 'Language không được để trống',
        ]);

        $guild = new Guild;
        $guild->Tag = $request->tag;
        $guild->Name = $request->name;
        $guild->Desc = $request->desc;
        $guild->MinLevel = $request->minLevel;
        $guild->Type = $request->type;
        $guild->Link = $request->link;
        $guild->Language = $request->language;
        $guild->save();
        return redirect()->route('guild.index')->with('thongbao', "Thêm mới guild '".$guild->Name."' thành công!");
    }

    public function postEdit(Request $request, $id) {
        $this->validate($request,[
            'tag' => 'required|digits:3|unique:guilds,Tag,'.$id,
            'name' => 'required|min:1|unique:guilds,Name,'.$id,
            'desc' => 'required',
            'minLevel' => 'min:0|numeric',
            'type' => 'numeric',
            'link' => 'required',
            'language' => 'required',
        ], [
            'tag.required' => 'Hãy nhập tên TAG',
            'tag.digits' => 'Độ dài tên TAG là: 3 ký tự',
            'tag.unique' => 'Tên TAG này đã tồn tại',
            'name.unique' => 'Tên GUILD này đã tồn tại',
            'name.required' => 'Hãy nhập tên GUILD',
            'desc.required' => 'Hãy nhập mô tả GUILD',
            'minLevel.min' => 'Thấp nhất 0',
            'minLevel.numeric' => 'Sai định dạng Min Level',
            'type.numeric' => 'Sai định dạng Type',
            'link.required' => 'Link không được để trống',
            'language.required' => 'Language không được để trống',
        ]);
        $guild = Guild::find($id);
        if($guild == null) return redirect()->back()->with('loi', "Không tìm thấy guild này này");
        $guild->Tag = $request->tag;
        $guild->Name = $request->name;
        $guild->Desc = $request->desc;
        $guild->MinLevel = $request->minLevel;
        $guild->Type = $request->type;
        $guild->Link = $request->link;
        $guild->Language = $request->language;
        $player->save();
        return redirect()->back()->with('thongbao', "Sửa guild thành công!");
    }

    public function delete($id) {
        $guild = Guild::find($id);
        if($guild == null) return redirect()->back()->with('loi', "Không tìm thấy guild này");
        $guild->delete();
        return redirect()->back()->with('thongbao', "Xoá guild '".$guild->Name."' thành công!");
    }
}
