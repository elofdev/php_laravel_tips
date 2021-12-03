<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - ep04</title>
</head>

<body>
    <form action="{{ route('user.store') }}" method="POST">
        <!-- @ csrf   é Autenticação do Blade...gera código hash
            evita que o site receba disparos de outros usuarios ou apps*>-->
            {{-- Método de segurança faz a criptografia da senha evita erro 409 --}}

        @csrf
        <label for="">Nome do Usuário:</label>
        <input type="text" name="name">

        <label for="">E-mail do Usuário:</label>
        <input type="text" name="email">

        <label for="">Senha do Usuário:</label>
        <input type="passwrord" name="password">
        <input type="submit" value="Cadastrar usuário">

    </form>
</body>

</html>
