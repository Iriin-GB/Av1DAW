<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "crudav1";



$connection = new mysqli($servidor, $usuario, $senha, $bancodeDados);
if ($connection->connect_error) {
    die("Conexao com o banco de dados falhou!!!");
}

$buscarTdsSQL = "SELECT `matricula`, `nome`, `email` FROM `sistema` "; //sqlquery

if ($resposta = mysqli_query($connection, $buscarTdsSQL)) { //gerando um exec da query


?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exibir Todas as Matrículas</title>
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
        <form action="exibirTodas.php" method="POST">

            <table>
                <tr>
                    <td>Matricula</td>
                    <td>Nome</td>
                    <td>Email</td>
                </tr>


            <?php
            while ($linha = mysqli_fetch_row($resposta)) { //linha recebe areas em pedaço

                $matExib = $linha[0];
                $nomeExib = $linha[1];
                $emailExib = $linha[2];

                echo "<tr><td>$matExib</td>
                <td>$nomeExib</td>
                <td>$emailExib</td> </tr>";
            }
        }

            ?>

            </tr>
            </table>
        </form>
    </body>

    </html>