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



$directory = "./";
$archive = $directory . basename($_FILES["enviar"]["name"]);
$txtForce = pathinfo($archive , PATHINFO_EXTENSION);

if($txtForce != "txt"){
    echo "Tipo de Arquivo Inválido, insira um arquivo .txt";
}else{
    $open = fopen($_FILES["enviar"]["name"],'r');

    while (($line = fgets($open) )!== false ) {
        
        $end = explode(";",$line); 

        $sqlInsert = "INSERT INTO `sistemaalunos`(`nome`, `email`, `senha`, `usuario`, `tipo`) VALUES ('$end[0]','$end[1]','$end[2]','$end[3]','$end[4]')";
        $result = $connection->query($sqlInsert);
    }
}

}

?>

<!-- _________________________________________________________________________________________ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Arquivo de Alunos</title>
</head>
<body>
    <h1>Enviar Arquivo de Alunos:</h1>
    <form action="inserirusuario.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="enviar" id="enviar"><br>
    <input type="submit" value="Enviar">

    </form>
</body>
</html>

