<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "crudav1";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($connection->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }

    if (isset($_POST["botaoBuscar"])) {
        $id = $_POST["id"]; //recebeu em uma var o valor de matricula

        $buscarSQL = "SELECT * FROM `sistema` WHERE `id` = '$id' "; //sqlquery

        if ($resposta = mysqli_query($connection, $buscarSQL)) { //gerando um exec da query
            while ($linha = mysqli_fetch_row($resposta)) { //linha recebe areas em pedaço


                $matNome = $linha[0];
                $matId = $linha[1];
                $matPeriodo = $linha[2];
                $matIdReq = $linha[3];
                $matCreditos = $linha[4];

            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Matrícula</title>
    <style>
        table {
            border: solid;
            border-width: 1px;
            border-collapse: collapse;
        }

        tr {
            border: solid;
            border-width: 1px;
            border-collapse: collapse;
        }

        td {
            padding: 3px;
            border: solid;
            border-width: 1px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div>
        <div><a style="margin-right: 25px" href="./criar.php">Criar Matricula</a> <a style="margin-right: 25px" href="./alterar.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="./apagar.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="./exibir.php">Exibir</a><a style="margin-right: 25px" href="./exibirTodas.php">Exibir Todas</a></div>
    </div>

    <br>
    <form action="exibir.php" method="POST">

        <label for="exibir">Número da ID: </label>
        <input type="text" name="id" placeholder="Digite o ID"><br>


        <input name="botaoBuscar" type="submit" value="Buscar">

        <?php if (isset($_POST["botaoBuscar"])) {
            echo " <table>
            <tr>
                <td>Nome</td>
                <td>id</td>
                <td>Período</td>
                <td>idReq</td>
                <td>Créditos</td>     
            </tr>
            <tr>
            <td>$matNome</td>
            <td>$matId</td>
            <td>$matPeriodo</td>
            <td>$matIdReq</td>
            <td>$matCreditos</td>           
        </tr>
           </table>";
        } ?>
    </form>
</body>

</html>