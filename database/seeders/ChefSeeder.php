<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChefSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->where('id', 1)->update(['is_chef' => true]);
    }
}