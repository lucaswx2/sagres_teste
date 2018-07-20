@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">
            <i class="fa fa-table"></i> Edição de nota
        </div>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{route ('notas.update', $nota->id)}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputDisciplina">Disciplina</label>
                        <select id="inputDisciplina" class="form-control"  name="disciplina_id" readonly required>
                                <option value="{{$nota->disciplina->id}}" selected>{{$nota->disciplina->nome}}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAluno">Aluno</label>
                        <select id="inputAluno" class="form-control"  name="aluno_id"  readonly required>
                                <option value="{{$nota->aluno->id}}"  selected>{{$nota->aluno->nome}}/{{$nota->aluno->matricula}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputNota1">Nota 1</label>
                        <input type="number" max="10" min="0" class="form-control" id="inputNota1"  name="nota_1" value="{{$nota->nota_1}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNota2">Nota 2</label>
                        <input type="number" max="10" min="0" class="form-control" id="inputNota2"  name="nota_2" value="{{$nota->nota_2}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNota3">Nota 3</label>
                        <input type="number" max="10" min="0" class="form-control" id="inputNota3"  name="nota_3" value="{{$nota->nota_3}}" required>
                    </div>
                </div>
                <a href="{{route ('notas.index',['disciplina'=>$nota->disciplina->id])}}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@endsection
