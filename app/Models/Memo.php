<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);//userの単数リレーション
    }
    public function folders()   
    {
        return $this->hasMany(Folder::class);  
    }

    use HasFactory;
}
