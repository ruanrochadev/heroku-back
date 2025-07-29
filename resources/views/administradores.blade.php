<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Administradores</title>
</head>
<body>
    <h1>Administradores</h1>

    @if ($administradores->count() > 0)
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Conta Ativa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($administradores as $administrador)
            <tr>
                <td><a href="{{ route('showAdm', $administrador->id) }}">{{ $administrador->id }}</a></td>
                <td>{{ $administrador->nome }}</td>
                <td>{{ $administrador->email }}</td>
                <td>{{ $administrador->telefone }}</td>
                <td>{{ $administrador->cpf }}</td>
                <td>{{ $administrador->conta_ativa ? 'Sim' : 'Não' }}</td>
                <td>
                <a href="{{ route('editAdm', $administrador->id) }}">Editar</a> |
                <a href="{{ route('deleteAdm', $administrador->id) }}">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Administradores não encontrados!</p>
    @endif
</body>
</html>
