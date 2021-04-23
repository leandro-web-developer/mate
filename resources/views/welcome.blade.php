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
    </style>
</head>

<body class="antialiased" style="">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-7 glass-container mt-5 p-3" id="glass">
                <div class="row">
                    <div class="col-12 border-bottom py-2">
                        <h2><strong>¡El dominio mate.uy está en venta!</strong></h2>
                        <h5>Completá el siguiente formulario y me pongo en contacto a la brevedad</h5>
                    </div>

                    <div class="col-12 py-2">
                        <form method="post" action="enviar">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <div class="input-group">
                                        <input id="nombre" name="nombre" placeholder="John Doe" type="text"
                                            required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="celular">Celular</label>
                                    <div class="input-group">
                                        <input id="celular" name="celular" placeholder="091234567" type="text"
                                            required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input id="email" name="email" placeholder="tuemail@ejemplo.com" type="text"
                                            required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="mensaje">Mensaje</label>
                                    <textarea id="mensaje" name="mensaje" cols="40" rows="5"
                                        class="form-control">Estoy interesado en el dominio mate.uy</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <button name="submit" type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
