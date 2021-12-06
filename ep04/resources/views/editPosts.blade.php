<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post - ep04</title>
</head>

<body>
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
        <!-- @ csrf   é Autenticação do Blade...gera código hash
            evita que o site receba disparos de outros usuarios ou apps*>-->
            {{-- Método de segurança faz a criptografia da senha evita erro 409 --}}

        @csrf
        @method('put')
        <label for="">Título:</label>
        <input type="text" name="title" value="{{ $post->title }}">

        <label for="">Subtítulo:</label>
        <input type="text" name="subtitle" value="{{ $post->subtitle }}">

        <label for="">Conteúdo:</label>
        <input type="text" name="content" value="{{ $post->subtitle }}">
        <input type="submit" value="Editar Usuário">

    </form>
</body>

</html>
