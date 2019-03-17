@extends('openHome')
@section('conteudo')
<div class="content">
    <div class="container">
        <div class="col-md-8">     
            <br>
            <div class="bg-primary text-black col-md-12 text-center"><h2><strong>CADASTRO DE JOGADOR</strong></h2></div>
            <br>
            <form  method="POST" action="/setplayer">
                <div class="form-row">
                    <input class="form-control" name="_token" type="hidden" value="{{ csrf_token() }}">

                    <div class="form-group col-md-4">
                        <label for="a001_name">Nome:</label><br>
                        <input class="form-control " type="text" name="a001_name" placeholder="Digite o primeiro nome" required><br>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="a001_surname">Sobrenome:</label><br>
                        <input class="form-control " type="text" name="a001_surname" placeholder="Digite o sobrenome" required><br>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="a001_birthday">Data Nascimento:</label><br>
                        <input class="form-control " type="date" name="a001_birthday" required><br>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="a001_gender">Gênero:</label><br>
                        <select class="form-control" name="a001_gender" required>
                            <option>Masculino</option>
                            <option>Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">

                        <label for="a001_email">Email:</label><br>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input class="form-control" type="email" name="a001_email"  id="email" placeholder="Digite o e-mail"><br>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="a001_zip">CEP:</label><br>
                        <input class="form-control" type="text" name="a001_zip"  id="zip" placeholder="Digite o CEP"><br>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="a001_address">Logradouro:</label><br>
                        <input class="form-control" type="text" name="a001_address" id="address" placeholder="Digite endereço"><br>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="a001_number">Número:</label><br>
                        <input class="form-control" type="text" name="a001_number" id="address" placeholder="Digite o número"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="a001_city">Cidade:</label><br>
                        <input class="form-control" type="text" name="a001_city" id="city" placeholder="Digite a cidade"><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="a001_neighbor">Bairro:</label><br>
                        <input class="form-control" type="text" name="a001_neighbor" id="neighbor" placeholder="Digite o bairro"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="a001_state">Estado:</label><br>
                        <input class="form-control" type="text" name="a001_state" id="state" placeholder="Digite o estado"><br>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="a001_country">País:</label><br>
                        <input class="form-control" type="text" name="a001_country" id="country" placeholder="Digite o país"><br>
                    </div>
                </div>
                <div class="form-group text-right">
                    <a href="/listplayers" id="cancelar" class="btn btn-md btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script>
$('#zip').live('keyup', function (e) {

    $.ajax({
        url: '/getcepplayer/' + $(this).val(),
        dataType: "json"
    }).done(function (response) {
        console.log(response);
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

@stop
