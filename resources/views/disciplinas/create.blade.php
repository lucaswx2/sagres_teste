@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">
            <i class="fa fa-table"></i> Cadastro de disciplina
        </div>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{route ('disciplinas.store')}}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" required>
                    </div>
                </div>
                <a href="{{route ('disciplinas.index')}}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
