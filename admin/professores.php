<?php
// controle de sessão
// iniciando a sessão
session_start();
// se a var sessão email não estiver setada o usuario sera redirecionado para o login
// somente é permitido acesso a essa página se a sessão foi iniciade
// apenas o usuario que fes login corretamente podera acessar

if (!isset($_SESSION['email'])) {
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
        <ul>
          <li>
            <a href="index.php" class="menu-ativo"><i class="fa-solid fa-chart-line"></i> Dassheborad</a>
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
            <div>
              <input class="input-cep" type="text" name="cep" id="cep">
              <button class="btn-cep" type="button" onclick="consultaCEP()"><i class="fa-thin fa-magnifying-glass"></i></button>
            </div>
            <div>
              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" id="cidade">
            </div>
            <div>
              <label for="estado">Estado</label>
              <input type="text" name="estado" id="estado">
              <select id="estado" name="estado">
                <option value="" disable select>Aguarde...</option> 
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
              </select>
            </div>
          </div>
          <div>
            <input class="btn-cadastrar" type="text" name="cep" id="cep">
            <button class="btn-cep" type="button" onclick="consultaCEP()"><i class="fa-thin fa-magnifying-glass"></i></button>
          </div>
          <button type="button" class="btn-cadastrar" onclick="">Cadastrar</button>
        </form>
      </div>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

  <script src="assets/js/jquery.inputmask.min.js"></script>



  <script src="https://kit.fontawesome.com/e3f1426157.js" crossorigin="anonymous"></script>
  <script src="assets/js/admin.js"></script>
</body>

</html>