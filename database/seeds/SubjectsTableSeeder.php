<?php

use Illuminate\Database\Seeder;
use App\Models\Users\Subjects;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $subject = [
        'id' => '1',
        'subject' => '国語',
    ];
    DB::table('subjects')->insert($subject);

    $subject = [
        'id' => '2',
        'subject' => '数学',
    ];
    DB::table('subjects')->insert($subject);

    $subject = [
        'id' => '3',
        'subject' => '英語',
    ];
    DB::table('subjects')->insert($subject);

    }
}


// //国語、数学、英語を追加
        // DB::table('subjects')->insert([
        //     'id' => 1,
        //     'subject' => '国語',
        //     'id' => 2,
        //     'subject' => '数学',
        //      'id' => 3,
        //     'subject' => '英語',
        //     'id' => 4,
        //     'subject' => '理科',
        //     'id' => 5,
        //     'subject' => '社会',

        // ]);
