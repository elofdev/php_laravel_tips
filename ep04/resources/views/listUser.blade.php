<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes do Usuário - ep04</title>
</head>
<body>
     <!-- Utilizará o método Show() no TestController.php -->
    <h1>Informações do Usuário - ep04</h1>
    <p>{{ $user->id }}</p>
    <p>{{ $user->name }}</p>
    <p>{{ date('d/m/y H:i', strtotime($user->created_at)) }}

    </p>
</body>
</html>
