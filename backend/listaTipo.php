<?php
    include 'include/conexao.php';

try {

    $sql = "SELECT id,tipo FROM tb_tipo WHERE ativo = 1";

    $comando = $con->prepare($sql);

    $comando->execute();

    // cria variavel e armazena o resulta da execucao do comando
    $retorno = $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $erro) {
    $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());
}

$json = json_encode($retorno,JSON_UNESCAPED_UNICODE);

echo $json;

$con = null;

?>
