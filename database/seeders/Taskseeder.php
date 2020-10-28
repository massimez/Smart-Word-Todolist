<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Taskseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('tasks')->insert([
                'taskname' => Str::random(10),
                'description' => Str::random(10) . 'blablabla',
                'duedate' => Carbon::tomorrow(),
                'priority' => rand(1, 5),
                'completed' => (bool)rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
