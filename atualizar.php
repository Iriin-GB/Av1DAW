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
$boolTest = false;
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Matrícula</title>

</head>

<body>
    <div>
        <div><a style="margin-right: 25px" href="./criar.php">Criar Matricula</a> <a style="margin-right: 25px" href="./alterar.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="./apagar.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="./exibir.php">Exibir</a><a style="margin-right: 25px" href="./exibirTodas.php">Exibir Todas</a></div>
    </div>

    <br>
    <form action="alterar.php" method="POST">

        <label for="altMat">Número Matrícula: </label>
        <input type="text" name="matricula" placeholder="Digite a Matrícula"><br>

        <input name="botaoAlt" type="submit" value="Buscar">

        <?php
        if ($boolTest == true) {
            echo "<label for=\"cadNome\">Nome do Aluno: <label> <input type=\"text\" name=\"nome\" placeholder=\"Digite o Nome\"><br>";

            echo "<label for=\"cadEmail\">Email: <label> <input type=\"text\" name=\"email\" placeholder=\"Digite o Email\"><br>";
        }
        ?>

    </form>
</body>

</html>

<?php
if (isset($_POST["botaoAlt"])) {

    $matricula = $_POST["matricula"];

    if ($matricula != "") {
        if (isset($_POST["botaoAlt"])) {
            $result = $connection->query("SELECT `nome`, `email` FROM `sistema` WHERE `matricula` = '$matricula' ");

            $row = mysqli_fetch_row($result);

            echo "<form action=\"alterar.php\" method=\"POST\">
                <input type=\"matricula\" name=\"matricula\" id=\"matricula\" value=\"$matricula\">
                    <input type=\"text\" name=\"nome\" id=\"nome\" value=\"$row[0]\">
                    <input type=\"text\" name=\"email\" id=\"email\" value=\"$row[1]\">
                    <input type=\"submit\" name=\"botaoAtt\" value=\"Enviar\">
                    </form>
                    ";


            if (isset($_POST["botaoAtt"])) {
                $matricula = $_POST["matricula"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];

                $atualizarSQL = "UPDATE  `sistema` SET `matricula` = '$matricula', `nome` = '$nome', `email` ='$email' ";
                $resultado = $connection->query($atualizarSQL);
                if (!$connection->query($atualizarSQL)) {
                    echo ("Error description: " . $conn->error);
                }
                echo $resultado;
                if ($resultado == true) {
                    echo "<p>Matrícula Criada!</p>";
                } else {
                    echo "<p>Falha na Atualização Cadastral!</p>";
                }
            }
        }
    }

    // $inserirSQL = "INSERT INTO `sistema`(`matricula`, `nome`, `email`) VALUES ('$matricula','$nome','$email')";

    // $resultado = $connection->query($inserirSQL);


    // if ($resultado == true) {
    //     echo "<p>Matrícula Criada!</p>";
    // } else {
    //     echo "<p>Falha no Cadastramento!</p>";
    // }
}
?>