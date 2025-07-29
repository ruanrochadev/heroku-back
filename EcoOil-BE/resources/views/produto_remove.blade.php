<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    @if ($produto)
        <h1>{{ $produto->nome }}</h1>
        <p>{{ $produto->descricao }}</p>
        <ul>
            <li>Quantidade: {{ $produto->qtd_estoque }}</li>
            <li>Preço: {{ $produto->preco }}</li>
            <li>Importado: {{ $produto->importado ? 'Sim' : 'Não' }}</li>
        </ul>
        <table>
            <tr>
                <td>
                    <form action="{{ route('removeProduto',$produto->id) }}" method='post'>
                        @csrf
                        <input type="submit" name='confirmar' value="Deletar" />
                        <input type="submit" name='confirmar' value="Cancelar" />
                    </form>
                </td>
                <td>
                    
                </td>
            </tr>
        </table>
    @else
        <p>Produtos não encontrados! </p>
    @endif
    <a href="/produtos">&#9664;Voltar</a>
</body>
</html>