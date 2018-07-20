@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">
            <i class="fa fa-table"></i> Listagem de disciplinas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($disciplinas as $disciplina)
                        <tr>
                            <td>{{$disciplina->id}}</td>
                            <td>{{$disciplina->nome}}</td>
                            <td>
                                <a href="{{route('disciplinas.edit', $disciplina->id)}}" title="Editar"><i
                                            class="fas fa-edit text-success"></i></a>
                                <a href="{{route('disciplinas.show', $disciplina->id)}}" title="Detalhar"><i
                                            class="fas  fa-search-plus text-primary"></i></a>
                                <a href="{{route('disciplinas.remove', $disciplina->id)}}" title="Excluir"><i
                                            class="fas fa-trash text-danger"></i></a>
                                <a href="{{route('notas.index', ['disciplina'=>$disciplina->id])}}" title="Notas"><i
                                            class="fas fa-clipboard"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted"><a href="{{route('disciplinas.create')}}">
                <button class="btn btn-primary">Adicionar</button>
            </a></div>
    </div>
@endsection
