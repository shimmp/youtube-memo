<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memos')->insert([
            'user_id' => '2',
            'title' => 'samplememo_1',
            'body' => 'こんにちは',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            DB::table('memos')->insert([
            'user_id' => '1',
            'title' => 'samplememo_2',
            'body' => 'こんにちは',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //
    }
}
