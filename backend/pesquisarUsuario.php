<?php
    include 'include/conexao.php';

try {

    $pesquisar = $_POST['pesquisar'];

    $sql = "SELECT * FROM tb_usuarios WHERE nome LIKE '%$pesquisar%' OR cpf LIKE '%$pesquisar%' ";

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