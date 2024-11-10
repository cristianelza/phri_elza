<?php

namespace Database\Seeders;

use App\Models\Layanan;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Layanan::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            array(
                'nama' => 'diskon pengiriman parang',
                'gambar' => 'diskon.png'
            ),
            array(
                'nama' => 'bantuan hukum',
                'gambar' => 'bantuan-hukum.png'
            ),
            array(
                'nama' => 'pengurusan perizinan oss',
                'gambar' => 'oss.png'
            ),
            array(
                'nama' => 'bantuan teknik kelistrikan',
                'gambar' => 'listrik.png'
            ),
            array(
                'nama' => 'desain interior',
                'gambar' => 'interior.png'
            ),
            array(
                'nama' => 'suplier',
                'gambar' => 'suplier.png'
            ),
            array(
                'nama' => 'konsultan financial perbankan',
                'gambar' => 'konsultan.png'
            ),
            array(
                'nama' => 'sertifikasi halal',
                'gambar' => 'halal.png'
            ),
            array(
                'nama' => 'lainnya',
                'gambar' => 'lainnya.png'
            ),
        ];

        foreach ($data as $value) {
            Layanan::insert($value);
        }
    }
}
