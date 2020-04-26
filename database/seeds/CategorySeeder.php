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
            'featured_img '=>'storage/uploads/15878987251366_2000.jpg',
            'slug'=>'videojuegos',
            'meta_desc'=>'todo sobre videojuegos',
            'meta_title'=>'videojuegos',
            'created_at '=>'2020-04-26 10:58:45',
            'updated_at'=>'2020-04-26 10:58:45'
        ]);
    }
}
