<?php

include 'include/conexao.php';

try{

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $tipo = $_POST['tipo'];

    // endereço
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado= $_POST['estado'];
    $complemento = $_POST['complemento'];

    // conversao da datq ´para o formato 01-10-2000
    // $senha = implode('_', array_reverse(explode('_', $data_nascimento)));
    // converter a data e remove o separador(-): 01102000
    $senha = date('dmY', strtotime($data_nascimento));
    // criptografa a senha do usuario
    $senha = sha1($senha);

    // inserção dso dados do usuario na tb_usuarios
    $sql = "INSERT INTO tb_usuarios('$nome','$email','$telefone','$cpf','$datsa_nascimento','$senha','$tipo')";

    $comando = $con->prepare($sql);

    $comando->execute();

    // captura o id da tabela do comando executado acima
    // necessário esse id para insert na tabela de endereço
    $id_usuario = $con->lastInsertId();

    // ============================Endereço=================================
    // cadastra o endereço na tb_endereços
    $sql = "INSERT INTO tb_endereços(cep,rua,numero,bairro,cidade,estado,complemento,id_usuario)VALUES('$cep','$rua','$numero','$bairro','$cidade','$estado','$complemento',$id_usuario)";

    $comando = $con->prepare($sql);
    $comando->execute();
    // ============================Final====================================

    // cria um array para ser convertido em JSON
    $retorno = array("retrono"=>"ok","mensagem"=>"Usuário inserido com sucesso!");

}catch(PDOException $erro){

    $retorno = array("retrono"=>"ok","mensagem"=>$erro->getMessage());

}

$json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

echo $json;

$con = null;

?>