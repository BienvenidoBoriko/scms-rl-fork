<?php

use Illuminate\Database\Seeder;

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
            'name'=>'videojuegos',
            'description'=>'todo sobre videojuegos',
            'featured_img'=>'storage/uploads/15878987251366_2000.jpg',
            'slug'=>'videojuegos',
            'visibility'=>'si',
            'meta_desc'=>'todo sobre videojuegos',
            'meta_title'=>'videojuegos',
            'created_at'=>'2020-04-26 10:58:45',
            'updated_at'=>'2020-04-26 10:58:45'
        ]);

        DB::table('categories')->insert([
            'name'=>'ordenadores',
            'description'=>'Noticias sobre Ordenadores ',
            'featured_img'=>'storage/uploads/1589042365ordenadores.jpg',
            'slug'=>'ordenadores',
            'visibility'=>'si',
            'meta_desc'=>'Noticias sobre Ordenadores ',
            'meta_title'=>'ordenadores',
            'created_at'=>'2020-05-09 16:39:25 ',
            'updated_at'=>'2020-05-09 16:39:25 '
        ]);

        DB::table('categories')->insert([
            'name'=>'Inteligencia artificial ',
            'description'=>'Noticias sobre Inteligencia artificial',
            'featured_img'=>'storage/uploads/1589042556ia.jpeg',
            'slug'=>'Inteligencia artificial ',
            'visibility'=>'si',
            'meta_desc'=>'Noticias sobre Inteligencia artificial',
            'meta_title'=>'Inteligencia artificial ',
            'created_at'=>'2020-05-09 16:42:36',
            'updated_at'=>'2020-05-09 16:42:36'
        ]);

        DB::table('categories')->insert([
            'name'=>'móviles',
            'description'=>'Noticias sobre Móviles',
            'featured_img'=>'storage/uploads/1589043332moviles.jpg',
            'slug'=>'móviles',
            'visibility'=>'si',
            'meta_desc'=>'Noticias sobre Móviles',
            'meta_title'=>'móviles',
            'created_at'=>'2020-05-09 16:55:32',
            'updated_at'=>'2020-05-09 16:55:32'
        ]);
    }
}