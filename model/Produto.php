<?php
require_once("../controller/mysqli_conexao.php");
 
class Produto
{
	PRIVATE $id_produto;
	PRIVATE $desc_produto;
	PRIVATE $id_modelo;
	PRIVATE $capacidade;
	PRIVATE $vlr_sugerido;
	PRIVATE $vlr_custo;
	PRIVATE $voltagem;
	PRIVATE $id_cor;
	PRIVATE $estoque;
		
	public function DetalhesProduto($id)
	{
		if ($id == NULL || $id == '' || $id == 0)
		{
			echo "
		    <script type=\"text/javascript\">
		    alert ('O id do produto deve ser inteiro e maior que zero');
		    </script>";
			return false;
		}
		
		$sql = mysqli_query($conn, "Select * From produtos Where id = ".$id);
		
		if ($sql->num_rows == 0)
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Não foi encontrado um produto com esse id.');
			</script>";
			return false;
		}
		
		$f = $sql->fetch_object();
		$this->id_produto = $f->id;
		$this->desc_produto = $f->desc_produto;
		$this->id_modelo = $f->id_modelo;
		$this->capacidade = $f->capacidade;
		$this->estoque = $f->estoque;
		$this->vlr_sugerido = $f->vlr_sugerido;
		$this->vlr_custo = $f->vlr_custo;
		$this->voltagem = $f->voltagem;
		$this->id_cor = $f->id_cor;
	}
	
	public function getDescProduto() {
		return $this->desc_produto;
	}

	public function getIdModelo() {
		return $this->id_modelo;
	}

    public function getCapacidade() {
		return $this->capacidade;
	}

	public function getVlrSugerido() {
		return $this->vlr_sugerido;
	}

	public function getVlrCusto() {
		return $this->vlr_custo;
	}

	public function getEstoque() {
		return $this->estoque;
	}

    public function getVoltagem() {
		return $this->voltagem;
	}

    public function getIdCor() {
		return $this->id_cor;
	}

    public function ListarProdutos()
	{
		$sql = mysqli_query($conn, "SELECT * FROM produto ORDER BY desc_produto");
		echo "<p>Total de produtos: <strong>".$sql->num_rows."</strong></p><br />";
		
		echo "<table width=\"600\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">";
		while ($x = $sql->fetch_object())
		{
		    print "<tr>
                     <td width=\"400\" class=\"cel_prods\"><strong>".htmlentities($x->desc_produto)."</strong></td>
                     <td width=\"100\" class=\"cel_prods\">R$ <strong>".$x->vlr_sugerido."</strong></td>
                     <td width=\"100\" class=\"cel_prods\"><a href=\"?area=produtos&acao=informacoes&id=".$x->id_produto."\">Detalhes</a></td>
                   </tr>
                   <tr>
                     <td colspan=\"3\" class=\"cel_prods\">".$x->desc_produto."</td>
                   </tr>
                   <tr>
                     <td colspan=\"3\">&nbsp;</td>
                   </tr>";
		}
		echo "</table>";
	}
}