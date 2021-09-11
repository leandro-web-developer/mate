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
    <script src="/js/app.js" defer></script>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <style>
    </style>
</head>

<body class="antialiased" style="">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-7 glass-container mt-5 p-3" id="glass">
                <div class="row">
                    <div class="col-12 py-2">
                        <?php
                        
                        // EL PAIS -----------
                        header('content-type:text/plain');
                        $url = 'https://www.elpais.com.uy';
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $html = curl_exec($ch);
                        curl_close($ch);
                        
                        if (preg_match_all('!<arti[^>]*>\s*<div class="image-container">\s*<a[^>]*><img[^>]*src="([^>]+)"[^>]*></a>[^>]*>[^>]<[^>]*>\s*<h2 class="title">\s*<a [^>]*href="([^"]+)"[^>]*>([^<]+)</a>!iu', $html, $m)) {
                            echo '<H1 class="py-4">NOTICIAS DE DIARIO EL PAÍS</H1>';
                            for ($i = 0; $i < count($m[0]); $i++) {
                                $img = $m[1][$i];
                                $urlx = $m[2][$i];
                                $titulo = $m[3][$i];
                                echo "<div class='col-12 py-2'>";
                                echo "<div class='row'>";
                                echo "<div class='col-6'><img src='{$img}' class='img-responsive' alt='{$titulo}'></div>";
                                echo "<div class='col-6'><a href='{$url}{$urlx}' target='_blank'>{$titulo}</a></div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        
                        // EL PUEBLO -----------
                        $url = 'https://diarioelpueblo.com.uy';
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $html = curl_exec($ch);
                        curl_close($ch);
                        
                        if (preg_match_all('!<h3 class="m_title[^>]*>\s*<a [^>]*href="([^"]+)">([^<]+)</a>!iu', $html, $m)) {
                            echo '<H1 class="py-4">NOTICIAS DE DIARIO EL PUEBLO DE SALTO</H1>';
                            for ($i = 0; $i < count($m[0]); $i++) {
                                $urlx = $m[1][$i];
                                $titulo = $m[2][$i];
                                echo "<div class='col-12 py-2'><a href='{$url}{$urlx}' target='_blank'>{$titulo}</a></div>";
                            }
                        }
                        ?>


                    </div>

                    <div class="col-12 py-2">
                        <h1></h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
