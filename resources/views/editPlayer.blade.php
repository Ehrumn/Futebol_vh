<!doctype html>
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
                background-color: #fff;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
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
        <div>
            
            <form action="/updateplayer/{{$lista['a001_id']}}" method="post">
                <div>
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <label for="a001_name">Nome:</label><br>
                    <input type="text" name="a001_name" placeholder="Digite o nome:" value="{{$lista['a001_name']}}"><br>
                    <input type="text" name="a001_surname" value="{{$lista['a001_surname']}}"><br>
                    <input type="text" name="a001_address" value="{{$lista['a001_address']}}"><br>
                    <input type="text" name="a001_city" value="{{$lista['a001_city']}}"><br>
                    <input type="text" name="a001_state" value="{{$lista['a001_state']}}"><br>
                    <input type="text" name="a001_country" value="{{$lista['a001_country']}}"><br>
                    <input type="text" name="a001_birthday" value="{{$lista['a001_birthday']}}"><br>
                    <input type="text" name="a001_gender" value="{{$lista['a001_gender']}}"><br>
                    <input type="email" name="a001_email" value="{{$lista['a001_email']}}">
                    <input type="submit" value="Commit">
                </div>
            </form>
        </div>
    </body>
</html>

