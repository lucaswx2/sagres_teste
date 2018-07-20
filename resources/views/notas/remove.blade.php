@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">  <i class="fa fa-trash"></i> Remover nota</div>
        <div class="card-body">
            <form method="post" action="{{route ('notas.destroy', $nota->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <h4>Tem certeza que deseja remover o nota?</h4>
                        <hr>
                        <h4>Sobre o produto</h4>
                        <p>Nome: {{$nota->nome}}</p>
                        <p>Código:  {{$nota->id}}</p>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-danger">Remover</button>
            </form>
        </div>
    </div>
    </div>
@endsection