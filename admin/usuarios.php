<?php
// controle de sessao
// iniciando a sessao
// session_start();

// se a var sessao email nao estiver setada o usuario sera redirecionado para o login
// somente e permitido acesso a essa pagina se a sessao foi iniciada
// apenas o usuario que fez login corretamente podera acessar esta pagina
// if(!isset($_SESSION['email'])){
//     header('Location: ../');
// }

?>

<!-- Header -->
<?php
    include 'include/head.php';
?>
<!-- Fim header -->
        <!-- Aside -->
        <?php 
            include 'include/aside.php'
        ?>
        <!-- Fim Aside -->
        <!-- aqui será o conteudo da pagina -->
        <main class="admin-corpo">
            <h2>Dashboard</h2>

            <div class="div-professores">
                <div class="tabs">
                    <div class="titulo-principal tab-ativo" onclick="abaCadastro()">
                        <p class="titulo-texto">Cadastro de Usuários</p>
                    </div>
                    <div class="titulo-principal" onclick="abaListagem()">
                        <p class="titulo-texto">Listagem</p>
                    </div>
                </div>

                <form id="form-professores">
                    <div class="grid-professores">
                        <div>
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome">
                        </div>
                        <div>
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div>
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone">
                        </div>
                        <div>
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf">
                        </div>

                        <div>
                            <label for="data_nascimento">Data Nascimento</label>
                            <input type="date" name="data_nascimento" id="data_nascimento">
                        </div>
                        <div>
                            <label for="tipo">Tipo</label>
                            <select name="tipo" id="tipo">
                                <option value="" disabled selected>Selecione...</option>
                            </select>
                        </div>


                        <div>
                            <label for="cep">CEP</label>
                            <div class="div-cep">
                                <input class="input-cep" type="text" name="cep" id="cep">
                                <button class="btn-cep" type="button" onclick="consultaCEP()"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                        <div>
                            <label for="rua">Rua</label>
                            <input type="text" name="rua" id="rua" disabled>
                        </div>
                        <div>
                            <label for="numero">Numero</label>
                            <input type="text" name="numero" id="numero" disabled>
                        </div>
                        <div>
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro" disabled>
                        </div>
                        <div>
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" disabled>
                        </div>
                        <div>
                            <label for="estado">Estado</label>
                            <!-- <input type="text" name="estado" id="estado"> -->
                            <select name="estado" id="estado" disabled>
                                <option value="" disabled selected>Aguarde...</option>
                                <option value="SP">SP</option>
                                <option value="RJ">RJ</option>
                                <option value="MG">MG</option>
                            </select>


                        </div>
                        <div>
                            <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" id="complemento">
                        </div>
                    </div>

                    <button class="btn-cadastrar" type="button" onclick="addUsuarios()">Cadastrar</button>







                </form>

                <div id="div-listagem">
                    <h4>Listasgem de usuários</h4>

                    <form id="form-listagem">
                        <div>
                            <label for="">Pesquisar usuários</label>
                            <div class="div-cep">
                                <input class="input-cep" type="text" name="pesquisar" id="pesquisar">
                                <button class="btn-cep" type="button" onclick="pesquisarUsuario()">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div id="resultado-listagem">

                    </div>

                </div>
            </div>

    </div>



    </main>
    
    <?php
        include 'include/footer.php'
    ?>