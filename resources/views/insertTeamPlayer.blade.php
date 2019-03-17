@extends('openHome')
@section('conteudo')
<div class="content">
    <div class="container">
        <div class="col-md-8">     
            <br>
            <div class="bg-primary text-black col-md-12 text-center"><h2><strong>VINCULAR JOGADOR</strong></h2></div>
            <br>
            <form  method="POST" action="/setteamplayer">
                <div class="form-row">
                    <input class="form-control" name="_token" type="hidden" value="{{ csrf_token() }}">

                    <div class="form-group col-md-5">
                        <label for="a002_id">Time:</label><br>
                        <select class="form-control" name="a002_id" required>
                            @foreach($teams as $team)
                            <option value="{{ $team['a002_id'] }}">{{ $team['a002_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="a001_id">Jogador:</label><br>
                        <select class="form-control" name="a001_id" required>
                            @foreach($players as $player)
                            <option value="{{ $player['a001_id'] }}">{{ $player['a001_name'] }} {{ $player['a001_surname'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="a003_position">Posição:</label><br>
                        <select class="form-control" name="a003_position" required>
                            <option>Armador</option>
                            <option>Atacante</option>
                            <option>Centroavante</option>
                            <option>Goleiro</option>
                            <option>Lateral</option>
                            <option>Lateral esquerdo</option>
                            <option>Lateral direito</option>
                            <option>Meia</option>
                            <option>Meia esquerda</option>
                            <option>Meia direita</option>
                            <option>Meia atacante</option>
                            <option>Ponta</option>
                            <option>Volante</option>
                            <option>Zagueiro</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="a003_salary">Salário:</label><br> 
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">R$</span>
                            </div>
                            <input class="form-control " type="text" name="a003_salary" placeholder="Digite o salário" required><br>
                        </div>
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
