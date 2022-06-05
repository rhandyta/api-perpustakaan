<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_code' => rand(1000,9999), 'slug' => 'novel' ,'category_name' => 'Novel'],
            ['category_code' => rand(1000,9999), 'slug' => 'cergam' ,'category_name' => 'Cergam'],
            ['category_code' => rand(1000,9999), 'slug' => 'komik' ,'category_name' => 'Komik'],
            ['category_code' => rand(1000,9999), 'slug' => 'ensiklopedi' ,'category_name' => 'Ensiklopedi'],
            ['category_code' => rand(1000,9999), 'slug' => 'nomik' ,'category_name' => 'Nomik'],
            ['category_code' => rand(1000,9999), 'slug' => 'antologi' ,'category_name' => 'Antologi'],
            ['category_code' => rand(1000,9999), 'slug' => 'dongeng' ,'category_name' => 'Dongeng'],
            ['category_code' => rand(1000,9999), 'slug' => 'biografi' ,'category_name' => 'Biografi'],
            ['category_code' => rand(1000,9999), 'slug' => 'catatan-harian' ,'category_name' => 'Catatan Harian'],
            ['category_code' => rand(1000,9999), 'slug' => 'novelet' ,'category_name' => 'Novelet'],
            ['category_code' => rand(1000,9999), 'slug' => 'fotografi' ,'category_name' => 'Fotografi'],
            ['category_code' => rand(1000,9999), 'slug' => 'karya-ilmiah' ,'category_name' => 'Karya Ilmiah'],
            ['category_code' => rand(1000,9999), 'slug' => 'tafsir' ,'category_name' => 'Tafsir'],
            ['category_code' => rand(1000,9999), 'slug' => 'kamus' ,'category_name' => 'Kamus'],
            ['category_code' => rand(1000,9999), 'slug' => 'panduan-how-to' ,'category_name' => 'Panduan (how to)'],
            ['category_code' => rand(1000,9999), 'slug' => 'atlas' ,'category_name' => 'Atlas'],
            ['category_code' => rand(1000,9999), 'slug' => 'buku-ilmiah' ,'category_name' => 'Buku Ilmiah'],
            ['category_code' => rand(1000,9999), 'slug' => 'teks' ,'category_name' => 'Teks'],
            ['category_code' => rand(1000,9999), 'slug' => 'majalah' ,'category_name' => 'Majalah'],
            ['category_code' => rand(1000,9999), 'slug' => 'buku-digital' ,'category_name' => 'Buku Digital'],
        ]);
    }
}
