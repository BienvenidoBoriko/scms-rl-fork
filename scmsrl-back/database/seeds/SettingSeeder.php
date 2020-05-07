<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'title',
            'value'=>'Scms-rl',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);

        DB::table('settings')->insert([
            'name' => 'desc',
            'value'=>'mi blog personal',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);

        DB::table('settings')->insert([
            'name' => 'lang',
            'value'=>'es',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);

        DB::table('settings')->insert([
            'name' => 'cover_img',
            'value'=>'storage/uploads/header-img/header-img.jpg',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);

        DB::table('settings')->insert([
            'name' => 'facebook',
            'value'=>'facebook.com',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);

        DB::table('settings')->insert([
            'name' => 'twitter',
            'value'=>'twitter.com',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);

        DB::table('settings')->insert([
            'name' => 'email',
            'value'=>'gmail.com',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);

        DB::table('settings')->insert([
            'name' => 'github',
            'value'=>'github.com',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);
        DB::table('settings')->insert([
            'name' => 'admin',
            'value'=>'2',
            'type'=>'page',
            'created_at'=>'2020/04/25',
            'updated_at'=>'2020/04/25',
        ]);
    }
}