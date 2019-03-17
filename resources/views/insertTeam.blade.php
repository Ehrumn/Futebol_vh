@extends('openHome')
@section('conteudo')
<div class="content">
    <div class="container">
        <div class="col-md-8">     
            <br>
            <div class="bg-primary text-black col-md-12 text-center"><h2><strong>Cadastro de Time</strong></h2></div>
            <br>
            <form  method="POST" action="/setteam">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <input class="form-control" name="_token" type="hidden" value="{{ csrf_token() }}">
                        <label for="a002_name">Nome:</label><br>
                        <input class="form-control " type="text" name="a002_name" placeholder="Digite o nome"><br>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="a002_zip">CEP:</label><br>
                        <input class="form-control" type="number" name="a002_zip"  id="zip" placeholder="Digite o CEP"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="a002_address">Logradouro:</label><br>
                        <input class="form-control" type="text" name="a002_address" id="address" placeholder="Digite endereço" ><br>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="a002_number">Número:</label><br>
                        <input class="form-control" type="text" name="a002_number" id="number" placeholder="Digite o número"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="a002_city">Cidade:</label><br>
                        <input class="form-control" type="text" name="a002_city" id="city" placeholder="Digite a cidade" ><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="a002_neighbor">Bairro:</label><br>
                        <input class="form-control" type="text" name="a002_neighbor" id="neighbor" placeholder="Digite o bairro" ><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="a002_state">Estado:</label><br>
                        <input class="form-control" type="text" name="a002_state" id="state" placeholder="Digite o estado" ><br>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="a002_country">País:</label><br>
                        <input class="form-control" type="text" name="a002_country" id="country" placeholder="Digite o país" ><br>
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

<script>
$('#zip').live('keyup', function (e) {

    $.ajax({
        url: '/getcepteam/' + $(this).val(),
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