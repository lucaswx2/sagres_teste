<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('alunos.index');
});

Route::get('/alunos/remove/{id}', 'AlunoController@remover')->name('alunos.remove');
Route::get('/disciplinas/remove/{id}', 'DisciplinaController@remover')->name('disciplinas.remove');
Route::resources([
    'alunos' => 'AlunoController',
    'disciplinas' => 'DisciplinaController',
    'notas' => 'NotaController'
]);