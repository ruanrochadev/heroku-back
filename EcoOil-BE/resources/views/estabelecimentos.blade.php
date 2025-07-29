<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estabelecimentos</title>
</head>
<body>
    <h1>Estabelecimentos</h1>

    @if ($estabelecimentos->count() > 0)
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Endereço</th>
                <th>Quantidade de Óleo (L)</th>
                <th>Telefone</th>
                <th>Aprovado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estabelecimentos as $estabelecimento)
            <tr>
                <td><a href="{{ route('showEstab', $estabelecimento->id) }}">{{ $estabelecimento->id }}</a></td>
                <td>{{ $estabelecimento->nome }}</td>
                <td>{{ $estabelecimento->tipo }}</td>
                <td>{{ $estabelecimento->endereco }}</td>
                <td>{{ $estabelecimento->qtd_oleo }}</td>
                <td>{{ $estabelecimento->telefone }}</td>
                <td>{{ $estabelecimento->aprovado ? 'Sim' : 'Não' }}</td>
                <td>
                    <a href="{{ route('editEstab', $estabelecimento->id) }}">Editar</a> |
                    <a href="{{ route('deleteEstab', $estabelecimento->id) }}">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Estabelecimentos não encontrados!</p>
    @endif
</body>
</html>
