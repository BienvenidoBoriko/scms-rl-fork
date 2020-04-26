<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'bboriko',
            'profile_img'=>'storage/uploads/1587893570IMG_20190310_105305.jpg',
            'cover_img'=>'storage/uploads/1587893570fondo.png',
            'bio'=>'admin del sitio',
            'status'=>'ofline',
            'github'=>'github.com/ejemplo ',
            'website'=>'ejemplo.es',
            'twitter'=>'ejemplo.es',
            'slug'=>'ejemplo.es',
            'rol_id'=>'1',
            'email' => 'ejemplo@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('meta_tags')->insert([
            'name' => 'meta_title',
            'value'=>'bboriko',
            'type'=>'author',
            'id_owner'=>'1'
        ]);

        DB::table('users')->insert([
            'name' => 'bboriko2',
            'profile_img'=>'storage/uploads/1587893570IMG_20190310_105305.jpg',
            'cover_img'=>'storage/uploads/1587893570fondo.png',
            'bio'=>'autor del sitio',
            'status'=>'ofline',
            'github'=>'github.com/ejemplo2 ',
            'website'=>'ejemplo2.es',
            'twitter'=>'ejemplo2.es',
            'slug'=>'ejemplo2.es',
            'rol_id'=>'1',
            'email' => 'ejemplo2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('meta_tags')->insert([
            'name' => 'meta_title',
            'value'=>'bboriko2',
            'type'=>'author',
            'id_owner'=>'2'
        ]);
    }
}
