<?php

namespace Database\Seeders;

use App\Models\LaporanSeeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class TabelLaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        LaporanSeeders::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            array(
                'user_id_pengirim' => '1',
                'kelompok_masalah_pengirim' => 'perampokan',
                'Desckripsi_masalah' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam commodi at facilis nam, eius suscipit
                dolorem.',
                'longtitude' => 0,
                'latitude' => 0
            ),
        ];

        foreach ($data as $value) {
            LaporanSeeders::insert($value);
        }
    }
}
