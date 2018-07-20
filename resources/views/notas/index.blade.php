@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">
            <i class="fa fa-table"></i> Listagem de notas
        </div>
        <div class="card-body">
            <h1>
                Curso de {{$disciplina->nome}}
            </h1>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Aluno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Nota 3</th>
                        <th>Média</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notas as $nota)
                        <tr>
                            <td>{{$nota->aluno->nome}}</td>
                            <td>{{$nota->nota_1}}</td>
                            <td>{{$nota->nota_2}}</td>
                            <td>{{$nota->nota_3}}</td>
                            <td>{{number_format(($nota->nota_1+$nota->nota_2+$nota->nota_3)/3,2)}}</td>
                            <td>
                                <a href="{{route('notas.edit', $nota->id)}}" title="Editar"><i
                                            class="fas fa-edit text-success"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer small text-muted">
            <a href="{{route ('disciplinas.index')}}" class="btn btn-default">Voltar</a>
            <a href="{{route('notas.create',['disciplina'=>$disciplina->id])}}">
                <button class="btn btn-primary" >Adicionar</button>
            </a></div>
    </div>
@endsection
