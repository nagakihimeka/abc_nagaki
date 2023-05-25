<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // 国語、数学、英語を追加
        DB::table('subject_users')->insert([
            'user_id'=>11,
            'subject_id'=>1
        ]);
    }
}
