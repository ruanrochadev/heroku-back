<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Adiministradores</title>
</head>
<body>
    @if ($administrador)
        <h1>{{ $administrador->nome }}</h1>
        <p>{{ $administrador->email }}</p>
        <ul>
            <li>telefone: {{ $administrador->telefone }}</li>
            <li>cpf: {{ $administrador->cpf }}</li>
            <li>Conta Ativa: {{ $administrador->conta_ativa ? 'Sim' : 'Não' }}</li>
        </ul>
    @else
        <p>Administrador não encontrado! </p>
    @endif
    <a href="{{route('indexAdm')}}">&#9664;Voltar</a> 
</body>
</html>