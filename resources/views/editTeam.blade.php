<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
        <div class="container">
            <div class="col-md-8">     
                <br>
                <div class="bg-primary text-black col-md-12 text-center"><h2><strong>Cadastro de Time</strong></h2></div>
                <br>
                <form  method="POST" action="/updateteam/{{$lista['a002_id']}}">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <input class="form-control" name="_token" type="hidden" value="{{ csrf_token() }}">
                            <label for="a002_name">Nome:</label><br>
                            <input class="form-control " type="text" name="a002_name" placeholder="Digite o nome" value="{{$lista['a002_name']}}" ><br>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="a002_zip">CEP:</label><br>
                            <input class="form-control" type="number" name="a002_zip"  id="zip" placeholder="Digite o CEP" value="{{$lista['a002_zip']}}" ><br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="a002_address">Logradouro:</label><br>
                            <input class="form-control" type="text" name="a002_address" id="address" placeholder="Digite endereço" value="{{$lista['a002_address']}}" ><br>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="a002_number">Número:</label><br>
                            <input class="form-control" type="text" name="a002_number" id="number" placeholder="Digite o número" value="{{$lista['a002_number']}}" ><br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="a002_city">Cidade:</label><br>
                            <input class="form-control" type="text" name="a002_city" id="city" placeholder="Digite a cidade" value="{{$lista['a002_city']}}" ><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="a002_neighbor">Bairro:</label><br>
                            <input class="form-control" type="text" name="a002_neighbor" id="neighbor" placeholder="Digite o bairro" value="{{$lista['a002_neighbor']}}" ><br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="a002_state">Estado:</label><br>
                            <input class="form-control" type="text" name="a002_state" id="state" placeholder="Digite o estado" value="{{$lista['a002_state']}}"  ><br>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="a002_country">País:</label><br>
                            <input class="form-control " type="text" name="a002_country" id="country" placeholder="Digite o país" value="{{$lista['a002_country']}}"  ><br>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <a href="/listteams" id="cancelar" class="btn btn-md btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>
$('#zip').live('keyup', function (e) {

    $.ajax({
    url: '/getcepteam/' + $(this).val(),
        dataType: "json"
            }).done(function (response) {         console.log(response);
            $('#address').val(response.logradouro);
            $('#neighbor').val(response.bairro);
            $('#city').val(response.localidade);
            $('#state').val(response.uf);
            $('#country').val('Brasil');
    });
});

            $('#cancelar').click(function () {
    $('input').val('');
        });
    //$('#salvar').on('submit');
</script>

