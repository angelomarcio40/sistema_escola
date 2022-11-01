<?php
    // controle de sessao
    // iniciando a sessao
    session_start();
    
    // se a var sessao email nao estiver setada o usuario sera redirecionado para o login
    // somente e permitido acesso a essa pagina se a sessao foi iniciada
    // apenas o usuario que fez login corretamente podera acessar esta pagina
    if(!isset($_SESSION['email'])){
        header('Location: ../');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistema Escola</title>
    <link rel="stylesheet" href="assets/css/style-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <aside class="admin-menu">
            <div class="admin-logo">Sistema - ADMIN</div>
            <nav>
                <ul>
                    <li>
                        <a href="index.php" class="menu-ativo"><i class="fa-solid fa-chart-line"></i> Dashboard</a>    
                    </li>
                    <li>
                        <a href="professores.php"><i class="fa-solid fa-chalkboard-user"></i> Professores</a>                        
                    </li>
                    <li>
                        <a href="alunos.php"><i class="fa-solid fa-graduation-cap"></i> Alunos</a>                        
                    </li>
                    <li>
                        <a href="notas.php"><i class="fa-solid fa-file-circle-check"></i> Notas</a>                        
                    </li>
                    <hr>
                    <li>
                        <a href="../backend/logout.php">
                            <i class="fa-solid fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- <div class="admin-logout">
                
            </div> -->


        </aside>
        <!-- aqui será o conteudo da pagina -->
        <main class="admin-corpo">
            <h2>Dashboard</h2>


            
        </main>
    </div>    
    <script src="assets/js/script-admin.js"></script>
</body>
</html>