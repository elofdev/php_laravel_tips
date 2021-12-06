<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Post - ep04</title>
</head>

<body>
    <form action="{{ route('posts.store') }}" method="POST">
        <!-- @ csrf   é Autenticação do Blade...gera código hash
            evita que o site receba disparos de outros usuarios ou apps*>-->
            {{-- Método de segurança faz a criptografia da senha evita erro 409 --}}

        @csrf
        <label for="">Autor:</label>
        <input type="text" name="author">

        <label for="">Título:</label>
        <input type="text" name="title">

        <label for="">Subtítulo:</label>
        <input type="text" name="subtitle">

        <label for="">Conteúdo:</label>
        <input type="text" name="content">
        <input type="submit" value="Cadastrar Post">

    </form>
</body>

</html>
