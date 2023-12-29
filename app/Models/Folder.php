<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);//Userへの単数リレーション
    }
    public function memos()
    {
        return $this->hasMany(Memo::class);  
    }
}
