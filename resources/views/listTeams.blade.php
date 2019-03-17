<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

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
        <div class="col-md-12 text-right">
            <div class="col-md-6 text-left">
                <a class="btn btn-success btn-sm" href="/insertteam">Novo Time</a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary btn-sm" href="/exportteams">Exportar CSV</a>
            </div>
        </div>
        <div class="col-md-12">
            <form action="/setTeam" method="post">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $row)                    
                        <tr>
                            <td>{{ $row['a002_name'] }}</td>
                            <td>{{ $row['a002_city'] }}</td>
                            <td>{{ $row['a002_state'] }}</td>
                            <td>
                                <a href="/editteam/{{ $row['a002_id'] }}">Editar</a> - 
                                <a href="/removeteam/{{ $row['a002_id'] }}">Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </form>
        </div>
    </body>
</html>

