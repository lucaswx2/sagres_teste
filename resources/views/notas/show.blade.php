@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">  <i class="fa fa-user"></i> Detalhes do nota</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre a nota</h4>
                    <p>Nome: {{$nota->nome}}</p>
                    <p>Código: {{$nota->id}}</p>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>

        </div>
    </div>
@endsection