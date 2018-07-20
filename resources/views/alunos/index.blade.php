@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">
            <i class="fa fa-table"></i> Listagem de alunos
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nome</th>
                        <th>Endereco</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Email</th>
                        <th>Data de entrada</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alunos as $aluno)
                        <tr>
                            <td>{{$aluno->matricula}}</td>
                            <td>{{$aluno->nome}}</td>
                            <td>{{$aluno->endereco}}</td>
                            <td>{{$aluno->cidade}}</td>
                            <td>{{$aluno->uf}}</td>
                            <td>{{$aluno->email}}</td>
                            <td>{{$aluno->data_entrada}}</td>
                            <td>
                                <a href="{{route('alunos.edit', $aluno->id)}}"><i
                                            class="fas fa-edit text-success"></i></a>
                                <a href="{{route('alunos.remove', $aluno->id)}}"><i
                                            class="fas fa-trash text-danger"></i></a>
                                <a href="{{route('alunos.show', $aluno->id)}}"><i
                                            class="fas  fa-search-plus text-primary"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted"><a href="{{route('alunos.create')}}">
                <button class="btn btn-primary">Adicionar</button>
            </a></div>
    </div>
@endsection
