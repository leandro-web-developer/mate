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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-XEDC9PN0FT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XEDC9PN0FT');
    </script> --}}


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">
</head>

<body class="antialiased bg-white" id="body">

    @include('blocks.nav')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{-- PRESENTACION Y FILTRO ------ --}}
                <div class="row bg-white py-5">
                    <div class="col-12 col-md-6 offset-md-3 text-center mt-5">
                        <h1>¿Qué es mate.uy?</h1>
                        <h2>Somos un portal de resúmenes</h2>
                        <p>
                            Nos dedicamos a brindarte en un solo lugar el acceso a las noticias de los principales
                            periódicos del Uruguay. Con un único filtro podés buscar fácil lo que te interesa<br>
                            <b class="h3">¿A qué estás esperando? ¡Arrancá a buscar!</b>
                        </p>
                        <input type="text" class="form-control" id="filtro">
                    </div>
                </div>

                <div class="row">
                    <div class="col 12">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                                                crossorigin="anonymous"></script>
                        <!-- header -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3287845280992455"
                            data-ad-slot="4943350357" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>

                <div class="row">
                    <div class="col 12">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                                                crossorigin="anonymous"></script>
                        <!-- header2 -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3287845280992455"
                            data-ad-slot="7648021854" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-9">
                        <div class="row bg-light py-5">
                            <div class="col-12">
                                @include('diarios.elpais')
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-9">
                        <div class="row bg-light py-5">
                            <div class="col-12">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                                                                crossorigin="anonymous"></script>
                                <!-- elpais -->
                                <ins class="adsbygoogle" style="display:block"
                                    data-ad-client="ca-pub-3287845280992455" data-ad-slot="5045075090"
                                    data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>

                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                                                                crossorigin="anonymous"></script>
                                <!-- elpais2 -->
                                <ins class="adsbygoogle" style="display:block"
                                    data-ad-client="ca-pub-3287845280992455" data-ad-slot="9584947727"
                                    data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-9">
                        <div class="row bg-white py-5">
                            <div class="col-12">
                                @include('diarios.elobservador')
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-9">
                        <div class="row bg-light py-5">
                            <div class="col-12">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                                                                crossorigin="anonymous"></script>
                                <!-- elobservador -->
                                <ins class="adsbygoogle" style="display:block"
                                    data-ad-client="ca-pub-3287845280992455" data-ad-slot="8271866050"
                                    data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>

                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                                                                crossorigin="anonymous"></script>
                                <!-- elobservador2 -->
                                <ins class="adsbygoogle" style="display:block"
                                    data-ad-client="ca-pub-3287845280992455" data-ad-slot="8373946017"
                                    data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col 12">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                                                crossorigin="anonymous"></script>
                        <!-- elmate -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3287845280992455"
                            data-ad-slot="4830286829" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>

                <div class="row bg-light py-5">
                    <div class="col-12">
                        @include('blocks.mate')
                    </div>
                </div>

                <div class="row bg-white py-5">
                    <div class="col-12">
                        @include('blocks.uruguay')
                    </div>
                </div>

                <div class="row bg-primary py-5">
                    <div class="col-12">
                        @include('blocks.faqs')
                    </div>
                </div>

            </div>

            <script src="{{ asset('js/jquery.js') }}"></script>

            <script>
                window.filtrarTabla = (texto) => {
                    console.log('a');
                    $(`.noticia`).filter(
                        function() {
                            console.log('b');
                            let text = $(this).attr('data-text');
                            if (text != undefined) {
                                $(this).toggle(text.toLowerCase().indexOf(texto) > -1);
                            }
                        }
                    );
                };

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

                    $('#filtro').on('keyup', function() {
                        window.filtrarTabla($('#filtro').val());
                    });
                });
            </script>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3287845280992455"
                        crossorigin="anonymous"></script>
</body>

</html>
