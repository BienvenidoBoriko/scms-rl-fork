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
            'rol_id'=> 1,
            'email' => 'ejemplo@gmail.com',
            'meta_title'=>'bboriko',
            'meta_desc'=>'usuario bboriko',
            'password' => Hash::make('password'),
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
            'rol_id'=> 2,
            'email' => 'ejemplo2@gmail.com',
            'meta_title'=>'bboriko2',
            'meta_desc'=>'usuario bboriko2',
            'password' => Hash::make('password'),
        ]);

    }
}
