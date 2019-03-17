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
        <div class="container">
            <div class="col-md-8">     
                <br>
                <div class="bg-primary text-black col-md-12 text-center"><h2><strong>Cadastro de Time</strong></h2></div>
                <br>
                <form action="/setPlayer" method="post">
                    <div class="form-row">
                        <input class="form-control" name="_token" type="hidden" value="{{ csrf_token() }}">
                        
                        <div class="form-group col-md-4">
                            <label for="a002_name">Nome:</label><br>
                            <input class="form-control " type="text" name="a001_name" placeholder="Digite o primeiro nome"><br>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="a001_surname">Sobrenome:</label><br>
                            <input class="form-control " type="text" name="a001_surname" placeholder="Digite o sobrenome"><br>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="a002_zip">CEP:</label><br>
                            <input class="form-control" type="number" name="a002_zip"  id="zip" placeholder="Digite o CEP"><br>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="a002_zip">CEP:</label><br>
                            <input class="form-control" type="number" name="a002_zip"  id="zip" placeholder="Digite o CEP"><br>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="a002_address">Logradouro:</label><br>
                            <input class="form-control" type="text" name="a002_address" id="address" placeholder="Digite endereço" disabled><br>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="a002_number">Número:</label><br>
                            <input class="form-control" type="text" name="a002_number" id="address" placeholder="Digite o número"><br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="a002_city">Cidade:</label><br>
                            <input class="form-control" type="text" name="a002_city" id="city" placeholder="Digite a cidade" disabled><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="a002_neighbor">Bairro:</label><br>
                            <input class="form-control" type="text" name="a002_neighbor" id="neighbor" placeholder="Digite o bairro" disabled><br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="a002_state">Estado:</label><br>
                            <input class="form-control" type="text" name="a002_state" id="state" placeholder="Digite o estado" disabled><br>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="a002_country">País:</label><br>
                            <input class="form-control" type="text" name="a002_country" id="country" placeholder="Digite o país" disabled><br>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <a href="#" id="cancelar" class="btn btn-md btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <form action="/setPlayer" method="post">
            <div>
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <label for="a001_name">Nome:</label><br>
                <input type="text" name="a001_name" placeholder="Digite o nome:"><br>
                <input type="text" name="a001_surname"><br>
                <input type="text" name="a001_zip"><br>
                <input type="text" name="a001_address"><br>
                <input type="text" name="a001_city"><br>
                <input type="text" name="a001_state"><br>
                <input type="text" name="a001_country"><br>
                <input type="text" name="a001_birthday"><br>
                <input type="text" name="a001_gender"><br>
                <input type="email" name="a001_email">
                <input type="submit" value="Commit">
            </div>
        </form>
    </div>
</body>
</html>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>
$('#zip').live('keyup', function (e) {

    $.ajax({
    url: '/getcep/' + $(this).val(),
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

