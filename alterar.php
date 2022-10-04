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
        <form action="alterar.php" method="POST">

            <label for="altMat">ID Matéria: </label>
            <input type="text" name="id" placeholder="Digite a ID"><br>

            <input name="botaoAlt" type="submit" value="Buscar">

        </form>
        <hr>
    </div>
    <div style="float:left">
        <form action="alterar.php" method="POST">

            <label for="attNomeMat">Novo nome: </label>
            <input type="text" name="newNome" placeholder="Digite o novo nome" value="<?php      $nomeAlt?>"><br>
            <label for="attNomeMat">Novo periodo: </label>
            <input type="text" name="newPeriodo" placeholder="Digite o novo periodo" value="<?php      $periodoAlt?>"><br>
            <label for="attNomeMat">Nova Matéria requisito: </label>
            <input type="text" name="newIdReq" placeholder="Digite o novo requisito" value="<?php      $idReqAlt?>"><br>
            <label for="attNomeMat">Novo valor de créditos: </label>
            <input type="text" name="newCreditos" placeholder="Digite o novo créditos" value="<?php      $creditosAlt?>"><br>

            <input name="botaoAlt" type="submit" value="Mudar">

        </form>
    

</body>

</html>

<?php
if (isset($_POST["botaoAlt"])) {

    $id = $_POST["id"];
        $result = $connection->query("SELECT `nome`, `periodo`, `idReq`, `creditos` FROM `sistema` WHERE `id` = '$id' ");

        $row = mysqli_fetch_row($result);

        $nomeAlt = $row[0];
        $periodoAlt = $row[1];
        $idReqAlt = $row[2];
        $creditosAlt = $row[3];

        if (isset($_POST["botaoAtt"])) {
            $nome = $_POST["newNome"];
            $periodo = $_POST["newPeriodo"];
            $idReq = $_POST["newIdReq"];
            $creditos = $_POST["newCreditos"];

            $atualizarSQL = "UPDATE  `sistema` SET `nome` = '$nome', `periodo` = '$periodo', `idReq` ='$idReq', `creditos` ='$creditos' ";
            $resultado = $connection->query($atualizarSQL);
            if (!$connection->query($atualizarSQL)) {
                echo ("Error description: " . $conn->error);
            }
            // echo $resultado;
            if ($resultado == true) {
                echo "<p>Matrícula Criada!</p>";
            } else {
                echo "<p>Falha na Atualização Cadastral!</p>";
            }
        }
    }

?>