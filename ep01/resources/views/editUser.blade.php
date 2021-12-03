<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Dados do Usuário</title>
</head>

<body>
    <form action="{{route('users.edit', ['user' => $edit_user->id])}}" method="POST">

        {{-- Método de segurança faz a criptografia da senha evita erro 409 --}}
        @csrf

        {{-- Método Método de segurança faz com que o Laravel -- evita erro  POST method  is not Support ...PUT
        aceite/execute o method PUT mesmo sendo passado o POST no formulário --}}
        @method('PUT')

        <label for="">Nome do Usuário:</label>
        <input type="text" name="name" value="{{$edit_user->name}}">

        <label for="">E-mail do Usuário:</label>
        <input type="text" name="email" value="{{$edit_user->email}}">

        <label for="">Senha do Usuário:</label>
        <input type="password" name="password">
        <input type="submit" value="Alterar Dados do Usuário">

    </form>
</body>

</html>
