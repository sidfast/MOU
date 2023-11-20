<?php

class Conexao
{
    private static $connection;

    private function __construct(){}

    public static function getConnection() {

        $pdoConfig  = "sqlsrv" . ":". "Server=" . "52.5.245.24" . ";";
        $pdoConfig .= "Database="."Oficina".";";

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, "sa", "Yend15_oo");
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
         } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
         }
     }
}

try{
    $Conexao = Conexao::getConnection();
    echo "Conectei";
 }catch(Exception $e){
    echo $e->getMessage();
    exit;
 }
