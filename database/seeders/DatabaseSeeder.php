<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Layanan;
use App\Models\TipeKamar;
use App\Models\MasterMasalah;
use App\Models\NamaRuangan;
use Illuminate\Database\Seeder;
use Database\Seeders\TipeKamartableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'username' => 'adminPhri',
            'role_id' => '1',
            'address' => 'pontianak',
            'phone' => '08567898456',
            'email' => 'adminphri@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'username' => 'adminKsd',
            'role_id' => '1',
            'address' => 'pontianak',
            'phone' => '08567898456',
            'email' => 'adminksd@gmail.com',
            'password' => bcrypt('12345')
        ]);

        // if (TipeKamar::count()==0) {
        //     $this->call(TipeKamartableSeeder::class);
        // }

        // if (NamaRuangan::count()==0) {
        //     $this->call(NamaRuangantableSeeder::class);
        // }
        // User::create([
        //     'name' => 'Elza Cristian',
        //     'email' => 'elzacristian127@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::factory(3)->create();

        Category::create([
            'name' => 'Restoran',
            'slug' => 'restoran'
        ]);

        Category::create([
            'name' => 'Hotel',
            'slug' => 'hotel'
        ]);

        Category::create([
            'name' => 'Pariwisata',
            'slug' => 'pariwisata'
        ]);
        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);
        Category::create([
            'name' => 'Restoran',
            'slug' => 'restoran'
        ]);
        Category::create([
            'name' => 'Kuliner',
            'slug' => 'kuliner'
        ]);

        // Post::factory(20)->create();

        // MasterMasalah::create([
        //     'nama' => 'Perampokan',
        // ]);

        // MasterMasalah::create([
        //     'nama' => 'Perkelahian'
        // ]);

        // Layanan::create([
        //     'nama' => 'diskon pengiriman parang',
        //     'gambar' => 'diskon.png'
        // ]);

        // Layanan::create([
        //     'nama' => 'bantuan hukum',
        //     'gambar' => 'bantuan-hukum.png'
        // ]);

        // Layanan::create([
        //     'nama' => 'pengurusan perizinan oss',
        //     'gambar' => 'oss.png'
        // ]);

        // Layanan::create([
        //     'nama' => 'bantuan teknik kelistrikan',
        //     'gambar' => 'listrik.png'
        // ]);

        // Layanan::create([
        //     'nama' => 'desain interior',
        //     'gambar' => 'interior.png'
        // ]);

        // Layanan::create([
        //     'nama' => 'desain interior',
        //     'gambar' => 'interior.png'
        // ]);
        
        // Layanan::create([
        //     'nama' => 'suplier',
        //     'gambar' => 'suplier.png'
        // ]);
        
        // Layanan::create([
        //     'nama' => 'konsultan financial perbankan',
        //     'gambar' => 'konsultan.png'
        // ]);

        // Layanan::create([
        //     'nama' => 'sertifikasi halal',
        //     'gambar' => 'halal.png'
        // ]);

        // Layanan::create([
        //     'nama' => 'lainnya',
        //     'gambar' => 'lainnya.png'
        // ]);





        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum, atque odio explicabo corrupti eum assumenda consequuntur, tempore libero dolor at. Tempora fugit
        //     aspernatur explicabo ex corporis facere iusto reprehenderit soluta rem in dignissimos suscipit quae beatae vitae
        //     exercitationem, ullam, ipsum perspiciatis laudantium mollitia labore? Voluptates aspernatur, similique illum vel odit ad
        //     quos corporis architecto sint qui doloremque quas omnis natus quisquam non optio necessitatibus et cum, delectus
        //     repellat nobis perferendis? Consectetur voluptatum nulla ipsam alias unde ducimus inventore iusto blanditiis, possimus
        //     soluta, quam itaque facilis dolores porro aspernatur velit illum explicabo sapiente!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum, atque odio explicabo corrupti eum assumenda consequuntur, tempore libero dolor at. Tempora fugit
        //     aspernatur explicabo ex corporis facere iusto reprehenderit soluta rem in dignissimos suscipit quae beatae vitae
        //     exercitationem, ullam, ipsum perspiciatis laudantium mollitia labore? Voluptates aspernatur, similique illum vel odit ad
        //     quos corporis architecto sint qui doloremque quas omnis natus quisquam non optio necessitatibus et cum, delectus
        //     repellat nobis perferendis? Consectetur voluptatum nulla ipsam alias unde ducimus inventore iusto blanditiis, possimus
        //     soluta, quam itaque facilis dolores porro aspernatur velit illum explicabo sapiente!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul ke tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum, atque odio explicabo corrupti eum assumenda consequuntur, tempore libero dolor at. Tempora fugit
        //     aspernatur explicabo ex corporis facere iusto reprehenderit soluta rem in dignissimos suscipit quae beatae vitae
        //     exercitationem, ullam, ipsum perspiciatis laudantium mollitia labore? Voluptates aspernatur, similique illum vel odit ad
        //     quos corporis architecto sint qui doloremque quas omnis natus quisquam non optio necessitatibus et cum, delectus
        //     repellat nobis perferendis? Consectetur voluptatum nulla ipsam alias unde ducimus inventore iusto blanditiis, possimus
        //     soluta, quam itaque facilis dolores porro aspernatur velit illum explicabo sapiente!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul ke empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus debitis laborum non optio omnis necessitatibus
        //     cupiditate nostrum, atque odio explicabo corrupti eum assumenda consequuntur, tempore libero dolor at. Tempora fugit
        //     aspernatur explicabo ex corporis facere iusto reprehenderit soluta rem in dignissimos suscipit quae beatae vitae
        //     exercitationem, ullam, ipsum perspiciatis laudantium mollitia labore? Voluptates aspernatur, similique illum vel odit ad
        //     quos corporis architecto sint qui doloremque quas omnis natus quisquam non optio necessitatibus et cum, delectus
        //     repellat nobis perferendis? Consectetur voluptatum nulla ipsam alias unde ducimus inventore iusto blanditiis, possimus
        //     soluta, quam itaque facilis dolores porro aspernatur velit illum explicabo sapiente!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
