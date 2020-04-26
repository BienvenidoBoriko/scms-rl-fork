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
            'featured_img '=>'storage/uploads/15878987251366_2000.jpg',
            'slug'=>'xbox',
            'meta_desc'=>'todo sobre xbox',
            'meta_title'=>'xbox',
            'created_at '=>'2020-04-26 10:58:45',
            'updated_at'=>'2020-04-26 10:58:45'
        ]);

    }
}
