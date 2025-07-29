<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Novo Estabelecimento</title>
</head>

<body>
    <h1>Criar Novo Estabelecimento</h1>
    <form action="/estabelecimentos" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" required/></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td><input type="text" name="tipo" required/></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco" required/></td>
            </tr>
            <tr>
                <td>Quantidade de Óleo (L):</td>
                <td><input type="number" name="qtd_oleo" required/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="tel" name="telefone" required/></td>
            </tr>
            <tr>
                <td>Aprovado:</td>
                <td><input type="checkbox" name="aprovado" /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar Estabelecimento"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/estabelecimentos" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>
