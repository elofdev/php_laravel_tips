<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUser()
    {
        /* Exemplo. 1
        Gera o $user e passa direto para a view atráves de um
        return view('listUser');

        $user = new User();
        $user->name = 'Gustavo WEB';
        $user->email = 'cursos@upinside.com.br';
        $user->password = Hash::make('123');
        $user->save();

        echo "<h1>Listagem de Usuários</h1>";
         */


        /* Exemplo: 2
        Carrega no $user, o resultado de sql where no bando de dados com a clausula id =1
        e traz somente o primeiro e passa para a view com 'nome_view' + [parâmetros]*/

        $user = User::Where('id', '=', 1)-> first();
        return view('listUser',
        ['userList' => $user]);// 'userList' é o nome que sera passado para a view...
    }

}
