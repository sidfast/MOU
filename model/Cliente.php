<?php

class Cliente {
    // atributosphp
    private int $id;
    private string $nome;
    private string $fone;
    private string $email;
    private string $dataCadastro;
     
    // metodos
    // Construtor
    
    // Construtor com valores pre-estabelecidos vazios
    function __construct(){
        $this->id = 0;
        $this->nome = "";
        $this->email = "";
        $this->fone = "";
        $this->dataCadastro = "";
        echo "Criei um objeto da classe ".__CLASS__;
    }

    // Gets
    function GetId(){
        return $this->id;
    }

    // Sets
    function SetId(int $pId){
        $this->id = $pId;
    }
}

// Criando primeiro objeto da classe usando a palavra reservada NEW
$cliente1 = new Cliente;

