<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


//Agrupador de namespace Form
Route::group(['namespace' => 'Form'], function () {


// 1) Verbo: GET
// MOSTRA: a LISTA todos os Usuários
Route::GET('usuarios','TesteController@listAllUsers') -> name('users.listAll');

// MOSTRA o Formulário CADASTRO
Route::GET('usuarios/novo','TesteController@formAddUser') -> name('users.formAddUser');

// MOSTRA: o formulário EDIÇÃO
Route::GET('usuarios/editar/{user}','TesteController@formEditUser') -> name('users.formEditUser');

// MOSTRA: os DADOS de UM Usuário
Route::GET('usuarios/{user}','TesteController@listUser') -> name('users.listUser');


// 2) Verbo: POST
// AÇÃO: do Formulário CADASTRO
Route::POST('usuarios/store','TesteController@storeUser')-> name('users.store');
//o name users.store, será colocado no parâmetro action do arquivo addUser.blade.php ..Ex <form action="{{rout(users.store)}}" method="POST">

// 3) Verbo: PUT / PATCH
// AÇÃO: do Formulário de EDIÇÃO
Route::PUT('usuarios/edit/{user}','TesteController@editUser')->name('users.edit');

// 4) Verbo: DELETE
Route::DELETE('usuarios/destroy/{user}','TesteController@destroyUser')->name('users.destroy');

});



