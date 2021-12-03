<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class TestController extends Controller
{
    /**
     * CHAMA A VIEW (listAllUsers) que lista todos os USUARIOSL
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        //retorna a view listAlllUser.blade.php
         //array associativo []
        return  view('listAllUsers',['users' => $users]);
    }

    /**
     * CHAMA  A VIEW (newUser) que conteém o FORM para cadastro de novos usuários
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('newUser');
    }

    /**
     * EXECUTA A AÇÃO DO FORM que está na  View(newUser)
     * e redireciona novamente para a View(listAllUsers)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index');

    }

    /**
     * MOSTRA AS INFORMAÇÕES DO USUÁRIO
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //injeção de dependência
        return view('listUser', ['user' => $user]);
    }

    /**
     *  CHAMA A VIEW ( editUser)
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        return view('editUser',[
            'user' => $user
        ]);
    }

    /**
     *  PREENCHE OS CAMPOS DO FORM DA VIEW ( editUser) e executa a ação do FORM
     * * e redireciona novamente para a View(listAllUsers)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user-> save();

        return redirect()->route('user.index');
    }

    /**
     * EXECUTA A AÇÃO DO BOTÃO DELETAR
     * * e redireciona novamente para a View(listAllUsers)
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('user.index');
    }
}
