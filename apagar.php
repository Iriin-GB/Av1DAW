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
    <title>Apagar Matrícula</title>

</head>

<body>
    <div>
        <div><a style="margin-right: 25px" href="./criar.php">Criar Matricula</a> <a style="margin-right: 25px" href="./alterar.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="./apagar.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="./exibir.php">Exibir</a><a style="margin-right: 25px" href="./exibirTodas.php">Exibir Todas</a></div>
    </div>

    <br>
    <form action="apagar.php" method="POST">

        <label for="apagarMat">ID da matéria: </label>
        <input type="text" name="id" placeholder="Digite a ID"><br>


        <input name="botaoApagar" type="submit" value="Apagar">

    </form>
</body>

</html>

<?php
if (isset($_POST["botaoApagar"])) {

    $id = $_POST["id"];

    $apagarSQL = "DELETE FROM `sistema` WHERE `id` = '$id' ";

    $resultado = $connection->query($apagarSQL);


    if ($resultado == true) {
        echo "<p>Matrícula Apagada!</p>";
    } else {
        echo "<p>Falha ao Apagar!</p>";
    }
}

?>