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
            'featured_img'=>'storage/uploads/15898985861366_2001.jpg',
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

        DB::table('meta_tags')->insert([
            'name' => 'meta_title',
            'value'=>'Xbox Series S',
            'post_id'=>1,
        ]);

        DB::table('meta_tags')->insert([
            'name' => 'meta_desc',
            'value'=>'Nuevos datos plantean el anuncio en mayo de la Xbox Series S, una versión más asequible de las Xbox Series X',
            'post_id'=>1,
        ]);

        DB::table('posts')->insert([
            'title'=>'Los móviles chinos arrasan en España ',
            'status'=>'publiced ',
            'user_id'=>1,
            'published_at'=>'2020-05-10 11:54:56',
            'html'=>'<p>La mitad de los usuarios que compraron un m&oacute;vil en el primer trimestre de 2020&nbsp;<strong>eligieron un Xiaomi o un Huawei</strong>. Estos dos fabricantes son actualmente los dos grandes triunfadores de este mercado en el que ahora otra firma, OPPO, va ganando enteros y ha crecido un 1024% con respecto al mismo periodo de 2019.</p>

<p>En ese ranking es destacable tambi&eacute;n el hecho de que&nbsp;<strong>solo Xiaomi y la propia OPPO han crecido de a&ntilde;o en a&ntilde;o en ventas</strong>. Huawei, Samsung y Apple pierden fuelle y cuota de mercado, pero algo parece claro: los fabricantes chinos de m&oacute;viles arrasan en Espa&ntilde;a.</p>

<h2>Xiaomi es la que m&aacute;s vende y la &uacute;nica que crece entre sus grandes rivales</h2>

<p>La irrupci&oacute;n de Xiaomi en el mercado espa&ntilde;ol ha sido espectacular:&nbsp;<a href="https://www.xataka.com/moviles/xiaomi-llega-oficialmente-a-espana-dos-tiendas-fisicas-y-sus-mi-mix-2-mi-a1-y-productos-mi-ecosystem">lleg&oacute; en noviembre de 2017</a>, y&nbsp;<strong>en apenas dos a&ntilde;os y medio ha logrado convertirse en el fabricante que m&aacute;s vende en nuestro pa&iacute;s</strong>. Al menos es lo que indican los datos de la consultora Canalys para el primer trimestre de 2020, que&nbsp;<a href="https://twitter.com/ShouZiChew/status/1258294092145934338">han sido compartidos</a>&nbsp;por Shou Zi Chew, presidente de la divisi&oacute;n internacional de Xiaomi:</p>

<p><img alt="xiaomi1" src="https://i.blogs.es/8c3bcf/xiaomi1/1366_2000.jpg" style="height:436px; margin-left:76px; margin-right:76px; width:766px" /></p>

<p>En esa tabla se muestra c&oacute;mo OPPO creci&oacute; de forma muy llamativa (1.024%) en la cuota de mercado de unidades vendidas en este trimestre con respecto al a&ntilde;o anterior, y es interesante ver c&oacute;mo estaban las cosas&nbsp;<strong>cuando se inici&oacute; ese camino hace dos a&ntilde;os</strong>. Los datos de Canalys para el primer trimestre de 2018 eran los siguientes:</p>

<p><img alt="canalysq12018" src="https://i.blogs.es/b1dd79/canalysq12018/1366_2000.jpg" style="height:450px; margin-left:78px; margin-right:78px; width:800px" /></p>

<p>Los buenos resultados de Xiaomi van m&aacute;s all&aacute; de lo que sucede en nuestro pa&iacute;s, y la empresa fue la &uacute;nica que logr&oacute; crecer en este primer trimestre en todo el mundo seg&uacute;n cifras de Canalys. Samsung, Huawei y Apple vendieron menos smartphones, y&nbsp;<strong>solo Xiaomi y Vivo lograron estar en positivo en ventas en esos tres primeros meses del a&ntilde;o</strong>.</p>

<p><img alt="canalys3" src="https://i.blogs.es/c5e2de/canalys3/1366_2000.jpg" style="height:874px; margin-left:78px; margin-right:78px; width:821px" /></p>

<p>Ser&aacute; interesante ver c&oacute;mo evoluciona el mercado, pero todo apunta a que&nbsp;<strong>la ca&iacute;da ser&aacute; generalizada para todos los fabricantes</strong>&nbsp;en los pr&oacute;ximos meses debido a la pandemia de coronavirus. En Canalys&nbsp;<a href="https://www.canalys.com/newsroom/canalys-worldwide-smartphone-shipments-fall-due-to-coronavirus">destacaban</a>&nbsp;c&oacute;mo las unidades distribuidas de smartphones, 272 millones en total, son las m&aacute;s bajas desde 2013, y las previsiones son que en el segundo trimestre de 2020 el descenso en unidades distribuidas alcance su pico para luego iniciar una cierta recuperaci&oacute;n.</p> ',
            'featured_img'=>'storage/uploads/15891116951366_2000.jpg',
            'featured'=>1,
            'custom_except'=>'Los móviles chinos arrasan en España: según Canalys Xiaomi se convierte en el mayor vendedor y OPPO crece un 1024%',
            'slug'=>'Los-móviles-chinos-arrasan-en-España',
            'category_id'=>4,
            'created_at'=>'2020-05-10 11:54:56',
            'updated_at'=>'2020-05-10 11:54:56'
        ]);

        DB::table('post_tags')->insert([
            'post_id' => 2,
            'tag_id'=> 2,
            'created_at'=>'2020-05-10 11:54:56',
            'updated_at'=>'2020-05-10 11:54:56'
        ]);

        DB::table('meta_tags')->insert([
            'name' => 'meta_title',
            'value'=>'Los-Los móviles chinos arrasan en España: según Canalys Xiaomi se convierte en el mayor vendedor y OPPO crece un 1024%',
            'post_id'=>2,
        ]);

        DB::table('meta_tags')->insert([
            'name' => 'meta_desc',
            'value'=>'Nuevos datos plantean el anuncio en mayo de la Xbox Series S, una versión más asequible de las Xbox Series X',
            'post_id'=>2,
        ]);


        DB::table('posts')->insert([
            'title'=>'El sistema de Google y Apple para los \'avisos de exposición\' de coronavirus',
            'status'=>'publiced ',
            'user_id'=>1,
            'published_at'=>'2020-05-10 14:58:23',
            'html'=>'<p>Google y Apple&nbsp;<a href="https://www.xataka.com/servicios/apple-google-se-alian-frente-al-covid-19-e-integraran-sistema-seguimiento-contagios-basado-bluetooth-ios-android">siguen avanzando</a>&nbsp;en el desarrollo de una soluci&oacute;n que permita ayudar en esa trazabilidad de contactos y&nbsp;<strong>detectar as&iacute; posibles contagios de forma r&aacute;pida sin invadir la privacidad de los usuarios</strong>.</p>

<p>Esa apuesta por la privacidad se ha reforzado en a &uacute;ltima revisi&oacute;n del desarrollo: los responsables del proyecto han destacado&nbsp;<strong>nuevas protecciones a la privacidad</strong>&nbsp;adem&aacute;s de facilitar el desarrollo de futuras aplicaciones que aprovechen este sistema.</p>

<h2>M&aacute;s protecciones a la privacidad</h2>

<p>En Google y Apple han destacado algunos cambios sensibles en la forma de trabajar del sistema. Para empezar, indicaban, las claves que se generan para el funcionamiento del sistema no se derivan de las anteriores &mdash;algo que pod&iacute;a hacer que pudi&eacute;ramos investigar su origen&mdash;,&nbsp;<strong>sino que ahora se generar&aacute;n de forma aleatoria</strong>&nbsp;&quot;cada 10-20 minutos&quot;. Adem&aacute;s han eliminado la Tracing Key de la especificaci&oacute;n original: persist&iacute;a en el dispositivo y pod&iacute;a comprometer la privacidad.</p>

<p><img alt="contact3" src="https://i.blogs.es/e00fba/contact3/1366_2000.jpg" style="height:480px; width:720px" /></p>

<p>Tambi&eacute;n se ha incluido una nueva secci&oacute;n de metadatos de Bluetooth que estar&aacute; cifrada y que&nbsp;<strong>incluir&aacute; por ejemplo datos sobre la intensidad de la transmisi&oacute;n</strong>&nbsp;(medida en dB) para poder establecer si la proximidad con esa persona era mayor o menor. Por &uacute;ltimo, se ha establecido un tiempo de exposici&oacute;n limitado a un valor m&aacute;ximo de 30 minutos tambi&eacute;n para proteger esa privacidad.</p>

<p>Como explican en las preguntas frecuentes (FAQ), el sistema &quot;<strong>descargar&aacute; al menos una vez al d&iacute;a una lista de balizas que se ha verificado que pertenecen a gente que ha dado positivo en COVID-19</strong>&nbsp;por parte de las autoridades sanitarias&quot;. A partir de ah&iacute; cada dispositivo comparar&aacute; la lista de balizas que registr&oacute; al estar en proximidad con ellas con la lista que se descarga del servidor, y si hay alguna coincidencia se notificar&aacute; al usuario de ello y se le informar&aacute; de los pasos a seguir.</p>

<p>En Google y Apple siguen insistiendo en todo momento en lo crucial que es en este tipo de soluci&oacute;n la transparencia y el hecho de que&nbsp;<strong>el usuario siempre tendr&aacute; el control sobre el sistema</strong>. Podr&aacute; activar y desactivar esas opciones e instalar o desinstalar aplicaciones que las usen en todo momento, y no hay ning&uacute;n tipo de datos relativos a su ubicaci&oacute;n que se env&iacute;en a un servidor centralizado.</p>

<p>La identidad del usuario nunca se comparte con otros usuarios ni con Google o Apple: las aplicaciones y estos sistemas&nbsp;<strong>simplemente pueden indicar si ese usuario ha estado con un usuario (sin saber qui&eacute;n es) que ha resultado dar positivo en un test de coronavirus</strong>. Y solo si ese usuario que se ha contagiado decide compartir esa informaci&oacute;n con el sistema.</p> ',
            'featured_img'=>'storage/uploads/1589122703google-covig.jpg',
            'featured'=>1,
            'custom_except'=>'El sistema de Google y Apple para los \'avisos de exposición\' de coronavirus permitirá estimar la intensidad de la proximidad',
            'slug'=>'El sistema de Google y Apple para los \'avisos de exposición\' de coronavirus',
            'category_id'=>4,
            'created_at'=>'2020-05-10 14:58:23',
            'updated_at'=>'2020-05-10 14:58:23'
        ]);

        DB::table('post_tags')->insert([
            'post_id' => 3,
            'tag_id'=> 3,
            'created_at'=>'2020-05-10 14:58:23',
            'updated_at'=>'2020-05-10 14:58:23'
        ]);

        DB::table('meta_tags')->insert([
            'name' => 'meta_title',
            'value'=>'El sistema de Google y Apple para los \'avisos de exposición\' de coronavirus',
            'post_id'=>3,
        ]);

        DB::table('meta_tags')->insert([
            'name' => 'meta_desc',
            'value'=>'El sistema de Google y Apple para los \'avisos de exposición\' de coronavirus',
            'post_id'=>3,
        ]);
    }
}