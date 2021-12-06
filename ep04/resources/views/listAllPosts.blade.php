<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Posts - ep04</title>
</head>
<body>
    <!-- Utilizará o método Index() no TestController.php -->
    <table>
        <tbody>
        <tr>
            <td>
                Autor:
            </td>

            <td>
                Título:
            </td>
            <td>
               Subtítulo:
            </td>
            <td>
                Conteúdo:
            </td>
            <td>
                Ações:
            </td>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->author }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->subtitle }}</td>
            <td>{{ $post->content }}</td>
            <td>
                <a href="{{ route('posts.show',['post' => $post->id]) }}">Ver Post</a>
                <form action="{{ route('posts.destroy', ['post'=> $post->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Remover" />
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
