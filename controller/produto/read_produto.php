<?php
require_once("../mysqli_conexao.php");
$result = mysqli_query($conn, "SELECT * FROM Produto");
?>
<html>
  <head>
    <title>Cadastro de Produtos</title>
  </head>
  <body>
    <h2>CADASTRO DE PRODUTOS</h2>
    <p>
      <a href="../../view/adicionar_produto.php">Novo produto</a>
    </p>
    <table width='80%' border=0>
      <tr gbcolor='#DDDDDD'>
        <td>Produto</td>
        <td>Descrição</td>
        <td>Ações</td>
      <tr>      
      <?php
      while ($res = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><img src=".$res["imagem"]." /></td>";
        echo "<td>".$res['desc_produto']."</td>";
        echo "<td><a href='edit_produto.php?id_cor=$res[id_produto]'>Editar</a>|
                   <a href='del_produto.php?id_cor=$res[id_produto]' 
                  onClick=\"return confirm('Tem certeza?')\">Deletar</a></td>";
        echo "</tr>";
      }
      ?>
    </table>
  </body>
</html>
