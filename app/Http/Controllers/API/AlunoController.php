<?php

namespace App\Http\Controllers\API;

use App\Aluno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Validator;
class AlunoController extends Controller
{


    protected function validarAluno($request){
        $validator = Validator::make($request->all(), [
            "nome" => "required",
            "matricula"=> "required | numeric | unique:alunos",
            "endereco" => "required",
            "bairro" => "required",
            "cep" => "required | numeric",
            "cidade" => "required",
            "uf" => "required",
            "email" => "required | email",
        ]);
        return $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?: 15;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        if($buscar){
            $alunos = Aluno::where('nome','like', "%$buscar%")->paginate($qtd);
        }else{
            $alunos = Aluno::paginate($qtd);
        }
        return response()->json($alunos,200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarAluno($request);
        if($validator->fails()){
            return $validator->errors();
        }
        $dados = $request->all();
        $aluno = Aluno::create($dados);
        if( $aluno->save()){
            return response()->json($aluno,201  );
        }else{
            return response()->json(['message'=>'Erro ao inserir aluno!'],400  );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::find($id);
        if($aluno){
            return response()->json($aluno,200   );
        }else{
            return response()->json(['message'=>'Aluno não encontrado!'],404  );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validarAluno($request);
        if($validator->fails()){
            return response()->json(['message'=>'Erro ao atualizar aluno!','erro'=>$validator->errors()],404  );
        }
        $aluno = Aluno::find($id);

        $dados = $request->all();
        $aluno->update($dados);
        if( $aluno){
            return response()->json($aluno,200  );
        }else{
            return response()->json('erro',200  );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::find($id)->delete();
        if( $aluno){
            return response()->json(['message'=>'Deletado com sucesso!'],200  );
        }else{
            return response()->json(['message'=>'Erro ao deletar aluno!'],404  );
        }
    }
}
