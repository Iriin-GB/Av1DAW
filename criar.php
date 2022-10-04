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
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Matéria</title>

</head>

<body>
    <div>
        <div><a style="margin-right: 25px" href="./criar.php">Criar Matricula</a> <a style="margin-right: 25px" href="./alterar.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="./apagar.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="./exibir.php">Exibir</a><a style="margin-right: 25px" href="./exibirTodas.php">Exibir Todas</a></div>
    </div>

    <br>
    <form action="criar.php" method="POST">

        <label for="cad">Nome da Matéria: </label>
        <input type="text" name="nome" placeholder="Digite o nome: "><br>

        <label for="cad">Numero do período: </label>
        <input type="text" name="periodo" placeholder="Digite o período"><br>

        <label for="cad">Materia Necessária para cursar: </label>
        <input type="text" name="idReq" placeholder="Digite a ID da matéria"><br>

        <label for="cad">Creditos necessários: </label>
        <input type="text" name="creditos" placeholder="Digite a quantidade"><br>

        <input name="botaoCad" type="submit" value="Enviar">

    </form>
</body>

</html>

<?php


if (isset($_POST["botaoCad"])) {

    $nome = $_POST["nome"];
    $periodo = $_POST["periodo"];
    $idReq = $_POST["idReq"];
    $creditos = $_POST["creditos"];

    $inserirSQL = "INSERT INTO `sistema`(`nome`, `periodo`, `idReq`, `creditos`) VALUES ('$nome', '$periodo', '$idReq', '$creditos')";

    $resultado = $connection->query($inserirSQL);


    if ($resultado == true) {
        echo "<p>Matéria Criada!</p>";
    } else {
        echo "<p>Falha no Cadastramento!</p>";
    }
}

?>