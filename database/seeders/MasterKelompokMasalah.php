<?php

namespace Database\Seeders;

use App\Models\MasterMasalah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasterKelompokMasalah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MasterMasalah::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            array(
                'nama' => 'perampokan',
                'gambar' => 'perampokan.png'
            ),
            array(
                'nama' => 'perkelahian',
                'gambar' => 'keributan.png'
            ),
            array(
                'nama' => 'lainnya',
                'gambar' => 'lainnya.png'
            ),
            array(
                'nama' => 'protitusi online',
                'gambar' => ''
            ),
            array(
                'nama' => 'narkoba',
                'gambar' => ''
            ),
            array(
                'nama' => 'pembunuhan',
                'gambar' => 'pembunuhan.png'
            ),
        ];

        foreach ($data as $value) {
            MasterMasalah::insert($value);
        }
    }
}
