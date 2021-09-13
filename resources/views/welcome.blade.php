<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        a {
            text-decoration: none;
        }

        /* Card Styles */

        .card-sl {
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .card-image img {
            max-height: 100%;
            max-width: 100%;
            border-radius: 8px 8px 0px 0;
        }

        .card-action {
            position: relative;
            float: right;
            margin-top: -25px;
            margin-right: 20px;
            z-index: 2;
            color: #E26D5C;
            background: #fff;
            border-radius: 100%;
            padding: 15px;
            font-size: 15px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
        }

        .card-action:hover {
            color: #fff;
            background: #E26D5C;
            -webkit-animation: pulse 1.5s infinite;
        }

        .card-heading {
            font-size: 18px;
            font-weight: bold;
            background: #fff;
            padding: 10px 15px;
        }

        .card-text {
            padding: 10px 15px;
            background: #fff;
            font-size: 14px;
            color: #636262;
        }

        .card-button {
            display: flex;
            justify-content: center;
            padding: 10px 0;
            width: 100%;
            background-color: #1F487E;
            color: #fff;
            border-radius: 0 0 8px 8px;
        }

        .card-button:hover {
            text-decoration: none;
            background-color: #1D3461;
            color: #fff;

        }


        @-webkit-keyframes pulse {
            0% {
                -moz-transform: scale(0.9);
                -ms-transform: scale(0.9);
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
            }

            70% {
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-transform: scale(1);
                transform: scale(1);
                box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
            }

            100% {
                -moz-transform: scale(0.9);
                -ms-transform: scale(0.9);
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
                box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
            }
        }

    </style>
</head>

<body class="antialiased" style="">
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
                echo '<H1 class="py-4">NOTICIAS DE DIARIO EL PAÍS</H1>';
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
                        echo "       <div class='card-sl noticia'>";
                        if (array_key_exists('i', $i)) {
                            echo "      <div class='card-image'>";
                            echo "          <img src='{$i['i']}' alt='{$i['t']}' />";
                            echo '      </div>';
                        }
                        if (array_key_exists('u', $i)) {
                            echo "      <div class='card-text'>{$i['t']}</div>";
                            echo "          <a href='{$i['u']}' class='card-button'> Purchase</a>";
                            echo '      </div>';
                        }
                        echo '       </div>';
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
</body>

</html>
