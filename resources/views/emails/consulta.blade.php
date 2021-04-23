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
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
            background-size: cover;
            background-repeat: none;
        }
    </style>
</head>

<body class="antialiased" style="">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-7 glass-container mt-5 p-3" id="glass">
                <div class="row">
                    <div class="col-12 border-bottom py-2">
                        <h2><strong>¡Interesado en el dominio!</strong></h2>
                        <h5>{{ $request->nombre }} está interesado en el dominio mate.uy</h5>
                    </div>

                    <div class="col-12 py-2">
                        <table class="table table-striper">
                            <tr>
                                <tr>Celular:</tr>
                                <tr>{{ $request->celular }}</tr>
                            </tr>
                            <tr>
                                <tr>Email:</tr>
                                <tr>{{ $request->email }}</tr>
                            </tr>
                            <tr>
                                <tr>Mensaje</tr>
                                <tr>{{ $request->mensaje }}</tr>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
