<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de tarefas</title>

        <link rel="stylesheet" href="<?php echo $base; ?>/assets/libs/bootstrap-5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="<?php echo $base; ?>/assets/css/style.css">
    </head>
    <body>
        <main class="container">
            <h6 class="text-center">Bem vindo a sua Lista de Tarefas - <?php echo $_SESSION['user']['email']; ?></h6>
            <section id="login" class="todo-item">
                <form method="POST" autocomplete="off">
                    <div class="mb-3">
                        <label for="user-email" class="form-label"> 
                            E-mail
                        </label>
                        <input 
                            id="user-email"
                            class="form-control"
                            type="email"
                            name="user-email"
                            maxlength="200"
                            required
                            aria-describedby="descriptionHelp"
                        />
                        <div id="descriptionHelp" class="form-text">
                            exemplo@exemplo.com
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="user-password" class="form-label"> 
                            Senha
                        </label>
                        <input 
                            id="user-password"
                            class="form-control"
                            type="password"
                            name="user-password"
                            maxlength="200"
                            required
                        />
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button id="login-btn" type="button" class="btn btn-outline-primary mb-3 ">
                            Entrar
                            <i class="bi bi-box-arrow-in-right"></i>
                        </button>
                    </div>
                </form>
                <div id="message" class="hide alert alert-danger" role="alert"></div>
            </section>
        </main>
        
        <script src="<?php echo $base; ?>/assets/libs/jquery/js/jquery.js"></script>
        <script src="<?php echo $base; ?>/assets/libs/bootstrap-5.1.3/js/bootstrap.min.js"></script>
        <script src="<?php echo $base; ?>/assets/js/login.js"></script>
    </body> 
</html>