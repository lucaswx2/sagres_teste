<?php

namespace App\Http\Controllers;
use Validator;
use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
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
        $qtd = $request['qtd'] ?: 2;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        if($buscar){
            $alunos = Aluno::where('nome','=', $buscar)->paginate($qtd);
        }else{
            $alunos = Aluno::paginate($qtd);
        }
        $alunos = $alunos->appends(Request::capture()->except('page'));

        return view('alunos.index', compact('alunos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
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
            return redirect()->back()->withErrors($validator->errors());
        }


        $dados = $request->all();
        $aluno = Aluno::create($dados);
        $aluno->save();
        return redirect()->route('alunos.index');
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

        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);

        return view('alunos.edit', compact('aluno'));
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
            return redirect()->back()->withErrors($validator->errors());
        }
        $aluno = Aluno::find($id);
        $dados = $request->all();
        $aluno->update($dados);
        return redirect()->route('alunos.index');

    }

    public function remover($id)
    {
        $aluno = Aluno::find($id);

        return view('alunos.remove', compact('aluno'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aluno::find($id)->delete();
        return redirect()->route('alunos.index');
    }
}
