<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function memo(Memo $memo)
    {
        return view('memos.memo');
    }
    
}