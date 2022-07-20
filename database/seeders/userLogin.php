<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userLogin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_user' => '8',
            'no_ktp' => '1122334455443322',
            'name' => 'Andin',
            'email' => 'andin@gmail.com',
            'password' => '$2y$10$MCatqPM5QsChM.6jyj1/5uFWxZJ9BGyuvKOF337VthA3PyThWf.5C',
            'phone_number' => '08123456789',
            'date_birth' => '1990-06-12',
            'gender' => 'P',
            'role' => 'admin',
            'photo' => '202207171859admin-icon-png-12.jpg',
            'created_at' => date('Y-m-d'),
            'updated_at' => null,
            'deleted_at' => null,
        ]);
        DB::table('users')->insert([
            'id_user' => '9',
            'no_ktp' => '11223344553453322',
            'name' => 'Anton',
            'email' => 'anton@gmail.com',
            'password' => '$2y$10$yTUBtcENU4Dcaar82u0PA.pytdrr3ByhU0iEM2U2IPNM0J4V927Bq',
            'phone_number' => '23847983234',
            'date_birth' => '2022-06-28',
            'gender' => 'L',
            'role' => 'member',
            'photo' => null,
            'created_at' => date('Y-m-d'),
            'updated_at' => null,
            'deleted_at' => null,
        ]);
    }
}
