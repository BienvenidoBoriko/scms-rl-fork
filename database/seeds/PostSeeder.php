<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=>'Nuevos datos plantean el anuncio en mayo de la Xbox Series S, una versión más asequible de las Xbox Series X',
            'status'=>'publiced ',
            'user_id'=>1,
            'published_at'=>'2020-04-26 11:04:29 ',
            'html'=>'<p>Durante mucho tiempo el anuncio de nuevas consolas de Microsoft se refiri&oacute; a&nbsp;<a href="https://www.xataka.com/videojuegos/xbox-anaconda-lockhart-nombres-clave-para-scarlett-ambiciosa-proxima-generacion-consolas-microsoft">dos modelos distintos</a>. El primero, &#39;Project Scarlett&#39;, estaba asociado a las ya anunciadas&nbsp;<a href="https://www.xataka.com/videojuegos/xbox-series-x-sera-nombre-proxima-generacion-consola-microsoft-que-llegara-2020-conocemos-su-aspecto">Xbox Series X</a>.</p>

            <p>Sin embargo junto a ella&nbsp;<a href="https://www.xataka.com/videojuegos/project-scarlett-no-estara-sola-microsoft-sigue-preparando-lockhart-version-pensada-para-streaming-videojuegos">se rumoreaba</a>&nbsp;una versi&oacute;n&nbsp;<a href="https://www.xataka.com/videojuegos/que-siempre-microsoft-esta-trabajando-segunda-xbox-barata-potente-que-acompanara-a-scarlett-kotaku">m&aacute;s modesta</a>, llamada &#39;Lockhart&#39;, que luego pareci&oacute; desaparecer del mapa. Esta variante vuelve ahora a convertirse en una posibilidad real, y&nbsp;<strong>algunos la llaman ya la &#39;Xbox Series S&#39;</strong>. Los nuevos datos indican que ser&iacute;a anunciada el pr&oacute;ximo mes de mayo.</p>

            <h2>El SSD ultrarr&aacute;pido seguir&aacute; ah&iacute;</h2>

            <p>Seg&uacute;n ese esquema, en Microsoft volver&iacute;an a una apuesta similar a la que existe hoy en d&iacute;a con la Xbox One X y la Xbox One S:&nbsp;<strong>un modelo m&aacute;s potente y ambicioso, y otro m&aacute;s modesto y asequible</strong>&nbsp;para poder atacar a dos espectros de mercado diferentes.</p>

            <p><img alt="" src="http://192.168.10.10/storage/uploads/15878977141366_2000 (1).jpg" style="height:288px; width:466px" /></p>',
            'featured_img'=>'storage/uploads/15878990691366_2000 (1).jpg ',
            'featured'=>1,
            'custom_except'=>'Nuevos datos plantean el anuncio en mayo de la Xbox Series S,una versión más asequible de las Xbox Series X ',
            'slug'=>'Xbox Series S',
            'category_id'=>1,
            'created_at'=>'2020-04-26 11:04:29',
            'updated_at'=>'2020-04-26 11:04:29'
        ]);

        DB::table('post_tags')->insert([
            'post_id' => 1,
            'tag_id'=> 1,
            'created_at'=>'2020-04-26 11:04:29',
            'updated_at'=>'2020-04-26 11:04:29'
        ]);
    }
}
