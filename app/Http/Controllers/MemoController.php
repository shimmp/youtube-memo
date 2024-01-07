<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function memo(Memo $memo)
    {
        return view('memos.memo');
    }
    public function edit(Memo $memo){
        return view('memo.memo')->with(['memo'=> $memo->get()]);
    }
    public function create(){
        return view('memo.memo_create');
    }
    public function store(Request $request,Memo $memo){
        $input = $request['memo'];
        $user = Auth::user();
        $memo->title=$input["title"];
        $memo->body=$input["body"];
        $memo->user_id=$user["id"];
        $memo->save();
        return redirect('/memos')->with(['memos'=> $memo]);
    }
     public function index(){
        $user = Auth::user();//ログインしているuserのテーブルを取得
        $memos = $user->memos()-> get(); // ユーザーに関連するメモを取得
        return view('memo.memo_index')->with(['memos'=> $memos]);
    }
}
