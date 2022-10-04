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
        $nomeAlt = "";
        $periodoAlt = "";
        $idReqAlt = "";
        $creditosAlt = "";
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
    
    </div>
    <div>
        <form action="atualizar.php" method="POST">

            <label for="altMat">ID Matéria: </label>
            <input type="text" name="id" placeholder="Digite a ID"><br>

            <input name="botaoAlt" type="submit" value="Buscar">

        </form>
    </div>
    
    

</body>

</html>

<?php
// if (isset($_POST["botaoAlt"])) {

//     $id = $_POST["id"];

//         $result = $connection->query("SELECT `nome`, `periodo`, `idReq`, `creditos` FROM `sistema` WHERE `id` = '$id' ");

//         $row = mysqli_fetch_row($result);

//         $nomeAlt = $row[0];
//         $periodoAlt = $row[1];
//         $idReqAlt = $row[2];
//         $creditosAlt = $row[3];

//     }

?>