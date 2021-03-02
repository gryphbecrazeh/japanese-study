<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'christopher@cordine.site',
            'password' => '$2y$10$Z6CQtZuXyIX1YC5L3Hybee/LPn.G1PVecKmcmQBfVs39Ht0833HuS',
            'remember_token' => '9IkMlKfibmu7iEcqc1KmVuvwMjCtueEGJIdLQKI1UCiwXzqij1g3hhukLvyb',
            'created_at' => '2021-03-01 00:19:03',
            'updated_at' => '2021-03-01 00:19:03'
        ]);
    }
}
