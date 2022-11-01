<?php
  // controle de sessão
  // iniciando a sessão
  session_start();
  // se a var sessão email não estiver setada o usuario sera redirecionado para o login
  // somente é permitido acesso a essa página se a sessão foi iniciade
  // apenas o usuario que fes login corretamente podera acessar

  if(!isset($_SESSION['email'])){
    header('Locatin: ../');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X esta pagina-UA-Compatible" cont ent="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Sistema Escola</title>
    <link rel="stylesheet" href="assets/css/style-admin.css" />
  </head>
  <body>
    <div class="container">
      <aside class="admin-menu">
        <di class="admin-logo">Sistem - ADMIN</di>
        <nav>
          <ul><li>
              <a href="index.php"class="menu-ativo"><i class="fa-solid fa-chart-line"></i> Dassheborad</a>
            </li>
            <li>
              <a href="professores.php"><i class="fa-solid fa-chalkboard-user"></i> Professores</a>
            </li>
            <li>
              <a href="alunos.php"><i class="fa-solid fa-graduation-cap"></i> Alunos</a>
            </li>
            <li>
              <a href="alunos.php"><i class="fa-solid fa-sheet-plastic"></i> Notas</a>
            </li>
          </ul>
        </nav>
        <div class="admin-logout">
            <li>
            <hr>
          <a href="../backend/logpout.php">
            <i class="fa-solid fa-power-off fa-2x">Sair</i>
        </li>
          </a>
        </div>
      </aside>
      <!-- aqui será o conteúdo da página -->
      <main class="admin-corpo">
      <h2>Gestão de Professores</h2>
      <div class="div-professores">
        <form id="form-professores">
            <div class="grid-professores">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="enome">
            </div>
            <div>
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email">
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
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep">
                <button type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div>
                <label for="rua">Rua</label>
                <input type="text" name="rua" id="rua">
            </div>
            <div>
                <label for="numero">Numero</label>
                <input type="text" name="numero" id="numero">
            </div>
            <div>
                <label for="bairro">Bairo</label>
                <input type="text" name="bairro" id="bairro">
            </div>
            <div>
                <label for="cidade">Cidade</label>
                <input type="text" name="cidadel" id="cidade">
            </div>
            <div>
                <label for="nestado">Estado</label>
                <input type="text" name="estado" id="estado">
            </div>
            <div>
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" id="complemento">
            </div>
        </form>
      </div>
            </div>
           
      </main>
    </div>

    <script
      src="https://kit.fontawesome.com/e3f1426157.js" crossorigin="anonymous"></script>
    <script src="assets/js/script-admin.js"></script>
  </body>
</html>
