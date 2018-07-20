@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">  <i class="fa fa-user"></i> Detalhes do aluno</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre o produto</h4>
                    <p>Nome: {{$aluno->nome}}</p>
                    <p>Matricula: {{$aluno->preco}}</p>
                    <p>Bairro: {{$aluno->bairro}}</p>
                    <p>CEP: {{$aluno->cep}}</p>
                    <p>Endereço: {{$aluno->endereco}},{{$aluno->bairro}} - {{$aluno->cidade}}/{{$aluno->uf}}</p>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>

        </div>
    </div>
@endsection