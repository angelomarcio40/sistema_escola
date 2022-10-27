<?php

try {
    include 'include/conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT email,senha FROM tb_usuarios WHERE email='$email' AND BINARY senha='$senha'";

    $comando = $con->prepare($sql);
    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    IF($DADOS !=NULL){
        session_start();
        $_SESSION['email']=$email;

        $retorno = array("retorno"=>"ok","mensagem"=>"Login efetuado com sucesso!");
    }else{
        $retorno = array("retorno"=>"erro","mensagem"=>"Dados inválidos!");
    }

} catch (PDOException $erro) {
    $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());
}

$jsno = json_encode($retorno,JSON_UNESCAPED_UNICODE);
echo $json;

$con=null;

?>