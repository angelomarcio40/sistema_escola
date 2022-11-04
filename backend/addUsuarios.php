<?php

include "include/conexao.php";

try{

    // array para limpeza dos campos
    $limpa = array('.','-','(',')',' ');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = str_replace($limpa,'',$_POST['telefone']);
    $cpf = str_replace($limpa,'',$_POST['cpf']);
    $data_nascimento = $_POST['data_nascimento'];

    // endereço
    $cep = str_replace($limpa,'',$_POST['cep']);
    $rua = $_POST['rua'];
    $numero = str_replace($limpa,'',$_POST['numero']);
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];

    // validação do campo tipo - disable no optiondo form
    if(!isset($_POST['tipo'])){
        $retorno = array("retorno"=>"erro","mensagem"=>"Escolha o tipo do cadastro");
        $json = json_encode($retorno, JSON_UNESCAPED_UNICODE);
        echo $json;
        exit;
    }else{
        $tipo = $_POST['tipo'];
    }
    
    // conversao da data para o formato 01-10-2000
    // $senha = implode('-', array_reverse(explode('-', $data_nascimento)));
    // converter a data e remove o separador(-): 01102000
    $senha = date('dmY', strtotime($data_nascimento));
    // criptografa a senha do usuario
    $senha = sha1($senha);

    // ATENÇÃO
    // necessario implementar validação de campos vazios
    // necessario omplementar validação do CPF e EMAIL já cadastrados
    // ATENÇÃO

    // insercao dos dados do usuario na tb_usuarios
    $sql = "INSERT INTO tb_usuarios(nome,email,cpf,telefone,data_nascimento,senha,id_tipo)VALUES('$nome','$email','$cpf','$telefone','$data_nascimento','$senha',$tipo)";

    $comando = $con->prepare($sql);

    $comando->execute();

    // captura o id da tabela do comando executado acima
    // necessario esse id para insert na tabela de endereco
    $id_usuario = $con->lastInsertId();

    // ============================Endereco=======================
    // cadastra o endereco na tb_enderecos
    $sql = "INSERT INTO tb_enderecos(rua,bairro,numero,cep,cidade,estado,complemento,id_usuario)VALUES('$rua','$bairro','$numero','$cep','$cidade','$estado','$complemento',$id_usuario)";

    $comando=$con->prepare($sql);
    $comando->execute();
    //============================FInal endereco==================

    // cria um array para ser convertido em JSON
    $retorno = array("retorno"=>"ok","mensagem"=>"Usuário inserido com sucesso!");

    



}catch(PDOException $erro){

    $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());

}

$json = json_encode($retorno, JSON_UNESCAPED_UNICODE);

echo $json;

$con = null;




?>