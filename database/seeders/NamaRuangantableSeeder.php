<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\NamaRuangan;

class NamaRuangantableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NamaRuangan::create(['name'=>"BANQUET ROUNDS"]);
        NamaRuangan::create(['name'=>"COCKTAIL ROUNDS"]);
        NamaRuangan::create(['name'=>"THEATER"]);
        NamaRuangan::create(['name'=>"CLASSROOM"]);
        NamaRuangan::create(['name'=>"BOARDROOM"]);
        NamaRuangan::create(['name'=>"CRESCENT ROUNDS"]);
        NamaRuangan::create(['name'=>"E-SHAPE"]);
        NamaRuangan::create(['name'=>"HOLLOW SQUARE"]);
        NamaRuangan::create(['name'=>"PERIMETER SETTING"]);
        NamaRuangan::create(['name'=>"ROYAL CONFERENCE"]);
        NamaRuangan::create(['name'=>"TALKSHOW"]);
        NamaRuangan::create(['name'=>"T-SHAPE"]);
        NamaRuangan::create(['name'=>"U-SHAPE"]);
    }
}
