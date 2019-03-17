@extends('openHome')
@section('conteudo')
<div class="content">

    <div class="col-md-12 row" style="top:20px;">

        <div class="col-md-12 text-right" style="bottom: 10px">
            <a class="btn btn-primary btn-sm" href="/exportteamplayers">Exportar CSV</a>
        </div>
        <div class="col-md-4">
            <div style="max-height: 300px; overflow: auto">
                <div class="bg-primary"><h3>Times</h3></div>
                <ul class="list-group">
                    @foreach($teams as $team)
                    <li class="list-group-item list-group-item-action" id='{{ $team['a002_id'] }}' onclick="carregaPlayer({{ $team['a002_id'] }})"> {{ $team['a002_name'] }}</li>
                    @endforeach
                </ul>

            </div>
        </div>

        <div class="col-md-8" id="div_players" >
            <div class="bg-primary col-md-12"><h3>Jogadores</h3></div>
            <form action="/setPlayer" method="post">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Posição</th>
                            <th scope="col">Salário</th>
                        </tr>
                    </thead>
                    <tbody id="Layer_Players">
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
            function carregaPlayer(id){
            $.ajax({
            url: "/getteamplayers/" + id,
                    dataType: "json"
            }).done(function (response){
            console.log(response);
                    let html = '';
                    response.forEach(function (item){
                    html += '<tr>';
                            html += "<td>" + item.a001_name + " " + item.a001_surname + "</td>";
                            html += "<td>" + item.a001_email + "</td>";
                            html += "<td>" + item.a001_city + "</td>";
                            html += "<td>" + item.a001_state + "</td>";
                            html += "<td>" + item.a003_position + "</td>";
                            html += "<td>" + item.a003_salary + "</td>";
                            html += '</tr>';
                    });
                    $('ul').find('li').removeClass('active');
                    $('#' + id).addClass('active');
                    $('#Layer_Players').html(html);
                    $('#div_players').removeAttr('hidden');
            });
            }

</script>
@stop