<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Subjects')->insert([
            ['subject' => 'Japanese',
            'created_at' => now()],
            ['subject' => 'Math',
            'created_at' => now()],
            ['subject' => 'English',
            'created_at' => now()]
        ]);
        // 国語、数学、英語を追加
    }
}
