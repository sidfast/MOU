<html>
  <head>
    <title>Novo Produto</title>
  </head>
  <body>
    <h2>Novo Produto</h2>
    <br>
    <p><a href="../controller/produto/read_produto.php">Voltar</a></p>
    <form action="../controller/produto/create_produto.php" method="post" name="add">
      <p>Nome do produto
        <input type="text" name="desc_produto">
      </p>
      <p>Nome da marca
        <input type="text" name="desc_marca">
      </p>
      <p>Nome da linha
        <input type="text" name="desc_linha">
      </p>
      <p>Nome do modelo
        <input type="text" name="desc_modelo">
      </p>
      <p>Capacidade
        <input type="text" name="capacidade">
      </p>
      <p>Valor de venda sugerido
        <input type="text" name="vlr_sugerido">
      </p>
      <p>Valor de custo
        <input type="text" name="vlr_custo">
      </p>
      <p>Voltagem
        <input type="text" name="voltagem">
      </p>
      <p>Nome da cor
        <input type="text" name="desc_cor">
      </p>
      <p>Quantidade em estoque
        <input type="text" name="estoque">
      </p>
      <p>Imagem
        <input type="text" name="imagem_caminho">
      </p>
      <br>
      <input type="submit" name="submit" value="Adicionar">
    </form>
  </body>
</html>