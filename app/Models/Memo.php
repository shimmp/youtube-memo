<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Memo extends Model
{
    protected $fillable=[
        'title',
        'body',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);//userの単数リレーション
    }
    

    use HasFactory;
}
