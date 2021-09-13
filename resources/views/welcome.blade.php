<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mate.uy</title>

    <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
    <META NAME="AUTHOR" CONTENT="Leandro do Carmo">
    <META NAME="REPLY-TO" CONTENT="leandro.m.docarmo@gmail.com">
    <LINK REV="made" href="mailto:leandro.m.docarmo@gmail.com">
    <META NAME="DESCRIPTION"
        CONTENT="Portal que reúne los principales diarios de noticias de Uruguay, El País, El Observador, La Diaria y Caras y Caretas. Además te mostramos información sobre el mate (infusión) y nuestro país Uruguay.">
    <META NAME="KEYWORDS"
        CONTENT="Noticias,Mate,Uruguay,Diario,Periódico,Portal,El País,El Observador,La Diaria,Caras y Caretas">
    <META NAME="Resource-type" CONTENT="Journal">
    <META NAME="Revisit-after" CONTENT="1 days">
    <META NAME="robots" content="ALL">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">

    <style>


    </style>
</head>

<body class="antialiased" style="padding-top:100px;">
    <nav class="navbar fixed-top navbar-dark bg-dark text-white">
        <span>Noticias:</span>
        <a class="navbar-brand" href="#noticas-el-pais">El País</a>
        <a class="navbar-brand" href="#">El Observador</a>
        <a class="navbar-brand" href="#">La diaria</a>
        <a class="navbar-brand" href="#">Caras y caretas</a>
        <span> | </span>
        Sobre el mate
        <span> | </span>
        Sobre Uruguay
    </nav>

    <div class="container">
        <div class="row">

            <?php
            
            // EL PAIS -----------
            header('content-type:text/plain');
            $url = 'https://www.elpais.com.uy';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $html = curl_exec($ch);
            $html = preg_replace('!\n!', '', $html);
            curl_close($ch);
            
            // BUSCO ARTICULOS -----
            if (preg_match_all('!<article[^>]*>(.*?)</article>!iu', $html, $m)) {
                echo '<H1 class="py-4" id="noticas-el-pais">NOTICIAS DE DIARIO EL PAÍS</H1>';
                $arr_elpais = [];
                $x = [];
                for ($i = 0; $i < count($m[0]); $i++) {
                    // EN CADA ARTICULO BUSCO URL Y TITULO -----
                    if (preg_match('!<h2 class="title">\s*<a [^>]*href="([^"]+)"[^>]*>([^<]+)</a>!iu', $m[0][$i], $h)) {
                        $uri = $url . $h[1];
                        // SOLO AGREGO AL ARRAY GENERAL SI NO EXISTE YA EN EL MISMO -----
                        if (!array_search($uri, array_column($arr_elpais, 'u'))) {
                            $x['u'] = $uri;
                            $x['t'] = $h[2];
            
                            // SI ENCONTRE LO DEMAS ENTONCES BUSCO LA IMAGEN -----
                            if (preg_match('!<img[^>]*src="([^"]+)"!iu', $m[0][$i], $img)) {
                                $x['i'] = $img[1];
                            }
                        }
                    }
                    $arr_elpais[] = $x;
                }
            
                if (count($arr_elpais) > 0) {
                    echo "<div class='row'>";
                    echo "  <div class='col-12 py-2'>";
                    echo "      <div class='row'>";
                    foreach ($arr_elpais as $i) {
                        if (array_key_exists('u', $i)) {
                            echo "       <div class='col-6 col-sm-4 col-md-3 py-2'>";
                            echo "          <div class='card-sl noticia'>";
                            echo "              <div class='card-image'>";
                            if (array_key_exists('i', $i)) {
                                echo "              <img src='{$i['i']}' alt='{$i['t']}' />";
                            } else {
                                echo "              <img src='" . asset('img/no-image.svg') . "' alt='Mate.uy - Sin foto' />";
                            }
                            echo '              </div>';
                            echo "              <div class='card-text'>{$i['t']}</div>";
                            echo "              <a href='{$i['u']}' class='card-button'>Ver en El País</a>";
                            echo '          </div>';
                            echo '       </div>';
                        }
                    }
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            }
            
            // EL PUEBLO -----------
            // $url = 'https://diarioelpueblo.com.uy';
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // $html = curl_exec($ch);
            // curl_close($ch);
            
            // if (preg_match_all('!<h3 class="m_title[^>]*>\s*<a [^>]*href="([^"]+)">([^<]+)</a>!iu', $html, $m)) {
            //     echo '<H1 class="py-4">NOTICIAS DE DIARIO EL PUEBLO DE SALTO</H1>';
            //     for ($i = 0; $i < count($m[0]); $i++) {
            //         $urlx = $m[1][$i];
            //         $titulo = $m[2][$i];
            //         echo "<div class='col-12 py-2'><a href='{$url}{$urlx}' target='_blank'>{$titulo}</a></div>";
            //     }
            // }
            
            ?>







            <div class="col-12 py-2">
                <h1></h1>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $('a[href^="#"]').click(function() {
                    var destino = $(this.hash);
                    if (destino.length == 0) {
                        destino = $('a[name="' + this.hash.substr(1) + '"]');
                    }
                    if (destino.length == 0) {
                        destino = $('html');
                    }
                    let d = destino.offset().top - 50;
                    $('html, body').animate({
                        scrollTop: d
                    }, 500);
                    return false;
                });
            });
        </script>
</body>

</html>
