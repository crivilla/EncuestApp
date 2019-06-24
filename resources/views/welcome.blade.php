<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EncuestApp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles --> <!--paleta: 222A68 , 654597 , 7067CF , 78CAD2 , A1D2CE -->
        <style>
            html, body {
                background-color: #ffffff;
                color: #222A68;
                font-family: Arial, Helvetica, sans-serif;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #654597;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    EncuestApp
                </div>
                <div>
                    <h2> Una herramienta de creación de encuestas para ofrecer a
                        los pacientes y usuarios de sus servicios médico-sanitarios. </h2>
                </div>

                <div class="links">
                    <a href="https://appmazinghealth.test/encuestas"> Encuestas </a>
                    <a href="https://appmazinghealth.test/medicos"> Médicos</a>
                    <a href="https://appmazinghealth.test/ambitos"> Ámbitos </a>
                    <!--<a href="https://appmazinghealth.test/pacientes"> Pacientes </a> -->

                    <h3> Diseñe cuestionarios personalizados y obtenga información útil sobre el grado de satisfacción de sus pacientes.  </h3>

                </div>
                <div aling="right">
                   <h4> Desarrollo de la aplicación por Ana Caamaño Cundins y Celia Rivilla Piñango. <h1/>
                       <h4> ETSII Universidad de Sevilla. 2019 <h2/>

                </div>

            </div>
        </div>
    </body>
</html>
