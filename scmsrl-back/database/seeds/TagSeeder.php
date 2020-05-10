<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name'=>'xbox',
            'description'=>'todo sobre xbox',
            'featured_img'=>'storage/uploads/15878987251366_2000.jpg',
            'slug'=>'xbox',
            'meta_desc'=>'todo sobre xbox',
            'meta_title'=>'xbox',
            'created_at'=>'2020-04-26 10:58:45',
            'updated_at'=>'2020-04-26 10:58:45'
        ]);

        DB::table('tags')->insert([
            'name'=>'xiaomi',
            'description'=>'noticias relacionadas con xiaomi',
            'featured_img'=>'storage/uploads/1589043486xiaomi.jpg ',
            'slug'=>'xiaomi',
            'meta_desc'=>'noticias relacionadas con xiaomi',
            'meta_title'=>'xiaomi',
            'created_at'=>'2020-05-09 16:58:06',
            'updated_at'=>'2020-05-09 16:58:06'
        ]);

        DB::table('tags')->insert([
            'name'=>'google',
            'description'=>'Noticias relacionadas con google',
            'featured_img'=>'storage/uploads/1589120693google.png',
            'slug'=>'google',
            'meta_desc'=>'Noticias relacionadas con google',
            'meta_title'=>'google',
            'created_at'=>'2020-05-10 14:24:54',
            'updated_at'=>'2020-05-10 14:24:54'
        ]);
    }
}