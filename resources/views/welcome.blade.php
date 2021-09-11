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

header('content-type:text/plain');
// define the URL to load
$url = 'https://diarioelpueblo.com.uy/';
// start cURL
$ch = curl_init(); 
// tell cURL what the URL is
curl_setopt($ch, CURLOPT_URL, $url); 
// tell cURL that you want the data back from that URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// run cURL
$output = curl_exec($ch); 
// end the cURL call (this also cleans up memory so it is 
// important)
curl_close($ch);
// display the output
echo $output;
                    // $html = "curl to html";
                    // if(preg_match_all('!<h2 class="title">\s*<a [^>]*href="([^"]+)">([^<]+)</a>!iu', $html, $m){
                    //     for($i=0, $i<count($m[0]), $i++){
                    //         $url = $m[1][$i];
                    //         $titulo = $m[2][$i];
                    //         echo "<a href='{$url}' target='_blank'>{$titulo}</a>"
                    //     }
                    // }
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
