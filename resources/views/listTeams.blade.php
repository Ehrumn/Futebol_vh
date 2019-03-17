@extends('openHome')
@section('conteudo')
<div class="contant">
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
</div>

@stop