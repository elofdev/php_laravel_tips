<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Empty_;

class TesteController extends Controller
{
    public function listAllUsers()

    //  1) LISTA TODOS OS USUÁRIOS DO BANCO DE DADOS
    // MOSTRA a LISTA
    {
        $users = User::all();
        // dd($users);
        // Apenas visualizar informações
        // Mostra informações da consulta do banco mais organizadas.
        //var_dump($users);
        // faz a mesma coisa do dd(), mas as informações visual não é muito legal

        //redireciona para a página LISTA de todos os Usuários
        return view('listAllUsers', ['users' => $users]);
    }

    // CONSULTA os DADOS
    // 2) CONSULTA INFORMAÇÕES DE UM  USUÁRIOS POR UM PARÂMETRO(ID) NA LISTA DE USUÁRIOS(1)
    //busca na lista de usuários pelo parâmetro id passado na rota user
    public function listUser(User $user)
    {
        // var_dump($user);
        // dd($user); apenas visualiar os dados.
        return view('listUser', [
            'dados' => $user
        ]);
    }

    // FORMULÁRIO DE CADASTRO

    // MOSTRA O FORMULÁRIO
    public function formAddUser()
    {
        return view('addUser');
    }

    // INSERE AS INFORMAÇÕES DO FORM(POST/REQUEST) E NO BD
    // e redireciona para a página da lista de usuários
    public function storeUser(Request $request)
    {
        // Insere(faz um sql'insert') no bd
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // Hash:make, criptigrafa a senha para enviar ao BD
        $user->save();

        //redireciona para a página LISTA de todos os Usuários
        return redirect()->route('users.listAll');
    }

    // FORMULÁRIO DE EDIÇÃO

    // MOSTRA FORMULÁRIO -- carregando com a variável edit_user
    public function formEditUser(User $user)
    {
        return view('editUser', [
            'edit_user' => $user
        ]);
    }

    // EDITA os dados -- carregados da váriável edit_user
    public function editUser(User $user, Request $request)
    {
        $user->name = $request->name;

        //Tratamento de informação: validação campo email
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            // Verdadeiro
            $user->email = $request->email;
        }

        //Tratamento de informação: validação campo senha...NÃO vazio
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        // salva as alterações
        $user->save();

        //redireciona para a página LISTA de todos os Usuários
        return redirect()->route('users.listAll');
    }

    // DELETA  os DADOS ...será enviado para o listAllUser Form action=""
    public function destroyUser(User $user){
        $user->delete();

        //redireciona para a página LISTA de todos os Usuários
        return redirect()->route('users.listAll');
    }

}
