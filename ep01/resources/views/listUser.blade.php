<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes do Usuário</title>
</head>
<body>
    <h1>Informações do Usuário</h1>
    <p>{{$dados->id}}</p>
    <p>{{$dados->name}}</p>
    <p>{{date('d/m/y H:i', strtotime($dados->created_at))}}

    </p>
</body>
</html>
