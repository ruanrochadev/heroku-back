<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Novo Administrador</title>
</head>

<body>
    <h1>Criar Novo Administrador</h1>
    <form action="/administradores" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" required/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="tel" name="telefone" required/></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf" required/></td>
            </tr>
            <tr>
                <td>Conta Ativa:</td>
                <td><input type="checkbox" name="conta_ativa" checked/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar Administrador"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/administradores" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>
