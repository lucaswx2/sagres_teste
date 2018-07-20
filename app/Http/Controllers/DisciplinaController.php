<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Pagination\Paginator;

use App\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    protected function validarDisciplina($request){
        $validator = Validator::make($request->all(), [
            "nome" => "required",
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
            $disciplinas = Disciplina::where('nome','=', $buscar)->paginate($qtd);
        }else{
            $disciplinas = Disciplina::paginate($qtd);
        }
        $disciplinas = $disciplinas->appends(Request::capture()->except('page'));

        return view('disciplinas.index', compact('disciplinas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarDisciplina($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }


        $dados = $request->all();
        $disciplina = Disciplina::create($dados);
        $disciplina->save();
        return redirect()->route('disciplinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disciplina = Disciplina::find($id);

        return view('disciplinas.show', compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disciplina = Disciplina::find($id);

        return view('disciplinas.edit', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validarDisciplina($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $disciplina = Disciplina::find($id);
        $dados = $request->all();
        $disciplina->update($dados);
        return redirect()->route('disciplinas.index');

    }

    public function remover($id)
    {
        $disciplina = Disciplina::find($id);

        return view('disciplinas.remove', compact('disciplina'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disciplina::find($id)->delete();
        return redirect()->route('disciplinas.index');
    }
}
