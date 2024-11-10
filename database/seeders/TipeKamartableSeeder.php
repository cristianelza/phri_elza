<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\TipeKamar;

class TipeKamartableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipeKamar::create(['title'=>"PRESIDENTIAL SUITE"]);
        TipeKamar::create(['title'=>" SUITE"]);
        TipeKamar::create(['title'=>"JUNIOR SUITE"]);
        TipeKamar::create(['title'=>"CLUB"]);
        TipeKamar::create(['title'=>"DELUXE"]);
        TipeKamar::create(['title'=>"SUPERIOR"]);
    }
}
