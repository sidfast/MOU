DROP PROCEDURE `sp_InserirProduto`;

DELIMITER $$

CREATE PROCEDURE `sp_InserirProduto`(
    IN p_desc_produto    VARCHAR(100),
    IN p_desc_marca      VARCHAR(100),
    IN p_desc_linha      VARCHAR(100),
    IN p_desc_modelo     VARCHAR(100),
    IN p_capacidade   VARCHAR(100),
    IN p_vlr_sugerido    FLOAT,
    IN p_vlr_custo       FLOAT,
    IN p_voltagem        INT,
    IN p_desc_cor        VARCHAR(100),
    IN p_estoque         FLOAT,
    IN p_imagem          VARCHAR(200)
  )
BEGIN
	DECLARE mensagem VARCHAR(100);
  SET mensagem = "";
    
	-- Se já existir produto com a mesma descrição verifico se mesma marca e modelo
    IF EXISTS(SELECT id_produto FROM Produto WHERE desc_produto = p_desc_produto) THEN
		  IF EXISTS(SELECT 1 FROM Modelo WHERE desc_modelo = p_desc_modelo) THEN
			  IF EXISTS(SELECT 1 FROM Marca WHERE desc_marca = p_desc_marca) THEN
				  SET mensagem = "Produto com estoque adicionado";
			  END IF;
		  END IF;
    END IF;

	IF (mensagem = "Produto com estoque adicionado") THEN
		UPDATE Estoque
           SET qt_estoque = qt_estoque + p_estoque
         WHERE id_produto = @id_produto;
	ELSE
    SET mensagem = "Produto inserido com sucesso";
		-- CALL Ins_Upd_Modelo(p_desc_modelo, @id_modelo); 
		-- CALL Ins_Upd_Marca(p_desc_marca); 
		-- CALL Ins_Upd_Linha(p_desc_linha);
 		-- CALL Ins_Upd_Cor(p_desc_cor, @id_cor); 
    SET @id_modelo = 1;
    SET @id_cor = 1;
		INSERT INTO Produto (desc_produto, id_modelo, capacidade,
      vlr_sugerido, vlr_custo, voltagem, id_cor, imagem) VALUES (
      p_desc_produto, @id_modelo, p_capacidade, p_vlr_sugerido,
      p_vlr_custo, p_voltagem, @id_cor, p_imagem);
  END IF;
END$$

DELIMITER ;
