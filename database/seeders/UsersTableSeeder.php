<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            ['over_name' => '田中',
            'under_name' => '太郎',
            'over_name_kana' => 'タナカ',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'User1@mailaddress.com',
            'sex' => '1',
            'birth_day' => '2000-01-01',
            'role' => '1',
            'password' => bcrypt('password1'),
            'created_at' => now(),
            'updated_at' => now()]
        ]);
    }
}
