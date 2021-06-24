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
        html, body{height:100%;width:100%;margin:0;padding:0;}
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .glass-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            border-radius: 10px;
            backdrop-filter: blur(15px);
            background-color: rgba(255, 255, 255, 0.375);
            box-shadow: rgba(0, 0, 0, 0.3) 2px 8px 8px;
            border: 0px rgba(255, 255, 255, 0.4) solid;
            border-bottom: 0px rgba(40, 40, 40, 0.35) solid;
            border-right: 0px rgba(40, 40, 40, 0.35) solid;
        }

        #whatsapp{
            font-size: 1.5rem;
        }
        #whatsapp img{
            height: 30px;
            float: left;
            margin-right: 10px;
        }
    </style>
</head>

<body class="antialiased" style="">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-7 glass-container mt-5 p-3" id="glass">
                <div class="row">
                    <div class="col-12 py-2">
                        <h2><strong>¡El dominio mate.uy está en venta!</strong></h2>
                        <h5 class="py-3">Si te interesa adquirirlo comunicate conmigo haciendo clic en el siguiente botón:</h5>
                        <a class="btn btn-success" href="https://wa.me/59899823128" id="whatsapp"><img src="{{ asset('img/whatsapp.svg') }}"> 099 823 128</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
