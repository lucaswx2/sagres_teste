<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Nota;
use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Validator;
class NotaController extends Controller
{
    protected function validarNota($request){
        $validator = Validator::make($request->all(), [
            "aluno_id" => "required",
            "disciplina_id" => "required",
            "nota_1" => "required",
            "nota_2" => "required",
            "nota_3" => "required",
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
        $disciplina = $request['disciplina'];
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        if($disciplina){
            $notas = Nota::where('disciplina_id','=', $disciplina)->with(['aluno','disciplina'])->paginate($qtd);
        }else{
            $notas = Nota::with(['aluno','disciplina'])->paginate($qtd);
        }
        $disciplina = Disciplina::find($disciplina);
        $notas = $notas->appends(Request::capture()->except('page'));

        return view('notas.index', compact('notas','disciplina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $disciplina = Disciplina::find($request['disciplina']);
        $alunos = Aluno::all();

        return view('notas.create', compact('disciplina','alunos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarNota($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $dados = $request->all();
        $nota = Nota::create($dados);
        $nota->save();

        return redirect()->route('notas.index',['disciplina'=>$nota->disciplina_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);

        return view('notas.show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::with(['aluno','disciplina'])->get()->find($id);
        return view('notas.edit', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validarNota($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $nota = Nota::find($id);
        $dados = $request->all();
        $nota->update($dados);
        return redirect()->route('notas.index',['disciplina'=>$nota->disciplina_id]);
    }

    public function remover($id)
    {
        $nota = Nota::find($id);

        return view('notas.remove', compact('nota'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nota::find($id)->delete();
        return redirect()->route('notas.index');
    }
}
