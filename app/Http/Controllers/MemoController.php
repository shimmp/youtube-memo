<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Memo;
use App\Http\Requests\MemoRequest;

class MemoController extends Controller
{
    public function memo(Memo $memo)
    {
        return view('memos.memo');
    }
    public function edit(Memo $memo){
        return view('memo.memo_edit')->with(['memo'=> $memo]);
    }
    public function create(Request $request){
        $video_id = $request['video_id'];
        return view('memo.memo_create',[
            'video_id'=> $video_id
            ]);
    }
    public function update(Request $request,Memo $memo){
        $input = $request['memo'];
        $memo->title=$input["title"];
        $memo->body = $input["body"];
        if (!empty($input['video_id'])){
            $memo->movie_id = $input["video_id"];
        }
        $memo->save();
        return redirect('/memos');
    }
    public function delete(Memo $memo){
        $memo->delete();
        return redirect('/memos');
    }
    public function store(Request $request,Memo $memo){
        $input = $request['memo'];
        $memo->title=$input["title"];
        $memo->body=$input["body"];
        $memo->user_id= Auth::id();
        if (!empty($input['video_id'])){
            $memo->movie_id = $input["video_id"];
        }
        $memo->save();
        return redirect('/memos')->with(['memos'=> $memo]);
    }
     public function index(){
        $user = Auth::user();//ログインしているuserのテーブルを取得
        $memos = $user->memos()-> get(); // ユーザーに関連するメモを取得
        return view('memo.memo_index')->with(['memos'=> $memos]);
    }
    public function meme(){
        return view('memo.meme');
    }
}
