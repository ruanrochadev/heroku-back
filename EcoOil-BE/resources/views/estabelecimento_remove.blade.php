<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Estabelecimento</title>
</head>

<body>
    @if ($estabelecimento)
        <h1>Estabelecimento: {{ $estabelecimento->nome }}</h1>
        <p>Tipo: {{ $estabelecimento->tipo }}</p>
        <ul>
            <li>Endereço: {{ $estabelecimento->endereco }}</li>
            <li>Quantidade de Óleo: {{ $estabelecimento->qtd_oleo }} Litros</li>
            <li>Telefone: {{ $estabelecimento->telefone }}</li>
            <li>Aprovado: {{ $estabelecimento->aprovado ? 'Sim' : 'Não' }}</li>
        </ul>

        <h3>Tem certeza que deseja deletar este estabelecimento?</h3>
        <form action="{{ route('removeEstab', $estabelecimento->id) }}" method="POST">
            @csrf
            <input type="submit" name="confirmar" value="Deletar" />
            <input type="button" value="Cancelar" onclick="window.history.back();" />
        </form>
    @else
        <p>Estabelecimento não encontrado!</p>
    @endif

    <a href="/estabelecimentos">&#9664; Voltar para a lista de estabelecimentos</a>
</body>

</html>
