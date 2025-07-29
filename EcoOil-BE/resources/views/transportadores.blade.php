<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Transportadores</title>
</head>
<body>
    <h1>Transportadores</h1>

    @if ($transportadores->count() > 0)
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome do Motorista</th>
                <th>Placa do Veículo</th>
                <th>Capacidade do Veículo (L)</th>
                <th>Telefone</th>
                <th>CNPJ</th>
                <th>Disponível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transportadores as $transportador)
            <tr>
                <td><a href="{{ route('showTransp', $transportador->id) }}">{{ $transportador->id }}</a></td>
                <td>{{ $transportador->nome_motorista }}</td>
                <td>{{ $transportador->placa_veiculo }}</td>
                <td>{{ $transportador->capacidade_veiculo }}</td>
                <td>{{ $transportador->telefone }}</td>
                <td>{{ $transportador->cnpj }}</td>
                <td>{{ $transportador->disponivel ? 'Sim' : 'Não' }}</td>
                <td>
                    <a href="{{ route('editTransp', $transportador->id) }}">Editar</a> |
                    <a href="{{ route('deleteTransp', $transportador->id) }}">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Transportadores não encontrados!</p>
    @endif
</body>
</html>
