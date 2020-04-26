<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'name' => 'admin',
            'desc'=>'admin del sitio',
            'created_at'=>'2020/04/25',
        ]);
        DB::table('rols')->insert([
            'name' => 'autor',
            'desc'=>'autor del sitio',
            'created_at'=>'2020/04/25',
        ]);
    }
}
