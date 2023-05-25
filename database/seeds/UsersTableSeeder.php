<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'over_name' => '福沢',
            'under_name' => '諭吉',
            'over_name_kana' => 'フクザワ',
            'under_name_kana' => 'ユキチ',
            'mail_address' => 'yukichi@gmail.com',
            'sex' => 1,
            'birth_day' => '2001-01-01',
            'role' => 1,
            'password' =>  Hash::make(123456789),


        ]);
    }
}
