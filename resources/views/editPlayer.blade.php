@extends('openHome')
@section('conteudo')
<div class="contant">
    <div class="container">
        <div class="col-md-8">     
            <br>
            <div class="bg-primary text-black col-md-12 text-center"><h2><strong>CADASTRO DE JOGADOR</strong></h2></div>
            <br>
            <?echo $lista[]?>
            <form  method="post" action="/updateplayer/{{$lista['a001_id']}}">
                <div class="form-row">
                    <input class="form-control" name="_token" type="hidden" value="{{ csrf_token() }}">

                    <div class="form-group col-md-4">
                        <label for="a001_name">Nome:</label><br>
                        <input class="form-control " type="text" name="a001_name" placeholder="Digite o primeiro nome" value="{{$lista['a001_name']}}" required><br>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="a001_surname">Sobrenome:</label><br>
                        <input class="form-control " type="text" name="a001_surname" placeholder="Digite o sobrenome" value="{{$lista['a001_surname']}}" required><br>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="a001_birthday">Data Nascimento:</label><br>
                        <input class="form-control " type="date" name="a001_birthday" value="{{$lista['a001_birthday']}}" required><br>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="a001_gender">Gênero:</label><br>
                        <select class="form-control" name="a001_gender" value="{{$lista['a001_gender']}}" required>
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
                            <input class="form-control" type="email" name="a001_email"  id="email" placeholder="Digite o e-mail" value="{{$lista['a001_email']}}" required><br>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="a001_zip">CEP:</label><br>
                        <input class="form-control" type="text" name="a001_zip"  id="zip" placeholder="Digite o CEP" value="{{$lista['a001_zip']}}" required><br>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="a001_address">Logradouro:</label><br>
                        <input class="form-control" type="text" name="a001_address" id="address" placeholder="Digite endereço" value="{{$lista['a001_address']}}" ><br>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="a001_number">Número:</label><br>
                        <input class="form-control" type="text" name="a001_number" id="number" placeholder="Digite o número" value="{{$lista['a001_number']}}" required><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="a001_city">Cidade:</label><br>
                        <input class="form-control" type="text" name="a001_city" id="city" placeholder="Digite a cidade" value="{{$lista['a001_city']}}"><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="a001_neighbor">Bairro:</label><br>
                        <input class="form-control" type="text" name="a001_neighbor" id="neighbor" placeholder="Digite o bairro" value="{{$lista['a001_neighbor']}}"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="a001_state">Estado:</label><br>
                        <input class="form-control" type="text" name="a001_state" id="state" placeholder="Digite o estado" value="{{$lista['a001_state']}}"><br>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="a001_country">País:</label><br>
                        <input class="form-control" type="text" name="a001_country" id="country" placeholder="Digite o país" value="{{$lista['a001_country']}}"><br>
                    </div>
                </div>
                <div class="form-group text-right">
                    <a href="/listplayers" id="cancelar" class="btn btn-md btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <!--    </div>
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
            </div>-->
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
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