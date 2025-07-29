<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Administrador</title>
</head>

<body>
    @if ($administrador)
        <h1>Administrador: {{ $administrador->nome }}</h1>
        <ul>
            <li>Email: {{ $administrador->email }}</li>
            <li>Telefone: {{ $administrador->telefone }}</li>
            <li>CPF: {{ $administrador->cpf }}</li>
            <li>Conta Ativa: {{ $administrador->conta_ativa ? 'Sim' : 'Não' }}</li>
        </ul>

        <h3>Tem certeza que deseja deletar este administrador?</h3>
        <form action="{{ route('removeAdm', $administrador->id) }}" method="POST">
            @csrf
            <input type="submit" name="confirmar" value="Deletar" />
            <input type="button" value="Cancelar" onclick="window.history.back();" />
        </form>
    @else
        <p>Administrador não encontrado!</p>
    @endif

    <a href="/administradores">&#9664; Voltar para a lista de administradores</a>
</body>

</html>
