<?php

try{
    define('SERVIDOR', 'localhost');
    define('USUARIO', 'root');
    define('SENHA','');
    define('BASEDADOS', 'db_escola2');

   
        $con    = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDADOS.";charset=utf8",USUARIO,SENHA);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "conectado";
}catch(PDOException $e){
        $retorno = array("retorno"=>"erro","mensagem"=>$e->getMessage());
        $json = json_encode($retorno,JSON_UNESCAPED_UNICODE);
        echo $json;
        exit;      
}