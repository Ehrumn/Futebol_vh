@extends('openHome')
@section('conteudo')
<div class='content'>
    
    <div class="col-md-12 text-right">
        <div class="col-md-6 text-left">
            <a class="btn btn-success btn-sm" href="/insertplayer">Novo Jogador</a>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-primary btn-sm" href="/exportplayers">Exportar CSV</a>
        </div>
    </div>
    <div class="col-md-12">
        <form action="/setPlayer" method="post">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $row)                    
                    <tr>
                        <td>{{ $row['a001_name'] }}</td>
                        <td>{{ $row['a001_surname'] }}</td>
                        <td>{{ $row['a001_email'] }}</td>
                        <td>{{ $row['a001_city'] }}</td>
                        <td>{{ $row['a001_state'] }}</td>
                        <td>
                            <a href="/editplayer/{{ $row['a001_id'] }}">Editar</a> - 
                            <a href="/removeplayer/{{ $row['a001_id'] }}">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </form>
    </div>
</div>
@stop