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
            'id' => 2,
            'over_name' => '中原',
            'under_name' => '中也',
            'over_name_kana' => 'ナカハラ',
            'under_name_kana' => 'チュウヤ',
            'mail_address' => 'nakahara@gmail.com',
            'sex' => 1,
            'birth_day' => '2000-01-01',
            'role' => 3,
            'password' =>  Hash::make(123456789),

        ]);
    }
}
