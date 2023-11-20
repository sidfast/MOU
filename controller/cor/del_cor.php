<?php
require_once("mysqli_conexao.php");

$id = $_GET['id_cor'];

$result = mysqli_query($conn, "DELETE FROM cor WHERE id_cor = $id");
?>
<html>
    <head>
        <title>Cor excluida</title>
    </head>
    <body>
        <p>Cor excluida!</p>
        <p><a href="read_cor.php">Voltar para lista de cores</a></p>
    </body>
</html>

