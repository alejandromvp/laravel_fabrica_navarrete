<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                background-color:#001233;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                color:#0466c8;  
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                /* color: #636b6f; */
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #particles-js{
                height: 100vh;
                width: 100%;
                position: fixed;
                z-index: 98;
            }

            .contenedor{
                width:90%;
                margin-left:auto;
                margin-right:auto;
                position:relative;
                margin:0px 20px 0px 20px;
                opacity:.85;
                z-index:99;
                background-position:center;
            }
        </style>
    </head>
    <body>
        <div id="particles-js"></div>
        <div class="contenedor">    
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}" style="z-index:1000;">Inicio</a>
                        @else
                            <a href="{{ route('login') }}">Ingresar</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registro</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div class="content">
                    <h1>Sistemad de stock y ventas</h1>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('js/particles.min.js') }}" defer></script>
        <script src="{{ asset('js/particle.js') }}" defer></script>
        <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
              crossorigin="anonymous"></script>
    </body>
</html>

