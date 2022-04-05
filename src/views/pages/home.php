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
        <main class="container-lg">
            <section id="add-section" class="todo-item">
                <form action=" method="POST" autocomplete="off">
                    <div class="mb-3">
                        <label for="description" class="form-label"> 
                            Descrição tarefa
                        </label>
                        <input 
                            id="description"
                            class="form-control"
                            type="text"
                            name="description"
                            minlength="3"
                            maxlength="200"
                            aria-describedby="descriptionHelp"
                        />
                        <div id="descriptionHelp" class="form-text">
                            Mínimo de 3 caracteres e máximo de 200 caracteres
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button id="btn-add" type="button" class="btn btn-outline-success mb-3 ">
                            Add
                            <i class="bi bi-plus-circle-fill"></i>
                        </button>
                    </div>
                </form>
<!-- Tarefa cadastrada com sucesso alert-success-->
<!-- Preencha o campo descrição alert-danger-->
                <div id="message" class="hide alert alert-danger text-center" role="alert"></div>
            </section>
            <hr/>
            <section id="show-todo-section" class="todo-item hide">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="2" >Ações</th>
                            <th>Tarefas</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-todo-list">
                    </tbody>
                </table>

            </section>
            <section id="empty-todo-list" class="todo-item">
                <div>
                    <div class="empty">
                        <img src="<?php echo $base; ?>/assets/images/Ellipsis.gif" width="80px">    
                        <img src="<?php echo $base; ?>/assets/images/f.png" width="100%" />
                    </div>
                </div>
            </section>
        </main>
        
        <input type="hidden" id="user-token" value='<?php echo $_SESSION['token']; ?>' />

        <script src="<?php echo $base; ?>/assets/libs/jquery/js/jquery.js"></script>
        <script src="<?php echo $base; ?>/assets/libs/bootstrap-5.1.3/js/bootstrap.min.js"></script>
        <script src="<?php echo $base; ?>/assets/js/home.js"></script>
    </body> 
</html>