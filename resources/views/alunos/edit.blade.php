@extends('shared.base')
@section('content')
    <div class="card mb-3 mt-4">
        <div class="card-header">
            <i class="fa fa-table"></i> Edição de aluno
        </div>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{route ('alunos.update', $aluno->id)}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="nome"  required value="{{$aluno->nome}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMatricula">Matricula</label>
                        <input type="text" class="form-control" id="inputMatricula" name="matricula" required value="{{$aluno->matricula}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail"  name="email" required value="{{$aluno->email}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputDTentrada">Data de entrada</label>
                        <input type="date" class="form-control" id="inputDTentrada"  name="data_entrada"required value="{{$aluno->data_entrada}}" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-8">
                        <label for="inputEndereco">Endereco</label>
                        <input type="text" class="form-control" id="inputEndereco"  name="endereco" required value="{{$aluno->endereco}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control" id="inputBairro"  name="bairro" required value="{{$aluno->bairro}}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCidade">Cidade</label>
                        <input type="text" class="form-control" id="inputCidade"  name="cidade" required value="{{$aluno->cidade}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEstado">Estado</label>
                        <select id="inputEstado" class="form-control"  name="uf" >
                            <option selected>Escolha...</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">CEP</label>
                        <input type="text" class="form-control" id="inputCEP"  name="cep" required value="{{$aluno->cep}}">
                    </div>
                </div>
                <a href="{{route ('alunos.index')}}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@endsection
