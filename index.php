<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>

<body>
    <form method="post" action="controller/usuarioController.php">
        <?php
        echo '<div style="
    margin: 30px auto;
    width: 350px;
    align-content: center;">';
        echo '<div class="d-grid">';
        @$cod = $_REQUEST['cod'];
        if (isset($cod)) {
            if ($cod == '170') {
                echo ('<br><div class="alert alert-success">');
                echo ('Dados inseridos.');
                echo ('</div>');
            }
            if ($cod == '172') {
                echo ('<br><div class="alert alert-danger">');
                echo ('Sua sessão expirou, entre novamente!');
                echo ('</div>');
            }
            if ($cod == '173') {
                echo ('<br><div class="alert alert-danger">');
                echo ('Verifique os dados e tente novamente!');
                echo ('</div>');
            }
        }
        echo '</div>';
        echo '</div>';
        ?>
        <div>
            <h1>Cadastro de usuarios</h1>
            <div class="form-group">
                <input class="form-control" type="hidden" name="id" id="">
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="" value="<?php @(isset($usuario) ? $usuario->getNome() : '') ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="" value="<?php @(isset($usuario) ? $usuario->getEmail() : '') ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input class="form-control" type="password" name="senha" id="" value="<?php @(isset($usuario) ? $usuario->getSemha() : '') ?>">
            </div>
            <div class="form-group">
                <label for="tipo_usuario">Usuario:</label>
                <select name="tipo_usuario" class="form-control">
                    <option>Selecione uma opção</option>
                    <option value="1">Administrador</option>
                    <option value="2">Normal</option>
                </select>
            </div>
            <div class="form-group">
                <br>
                <input class="form-control" type="submit" id="">
            </div>
            <a class="text" href="login.php">Já tem uma conta? Clique Aqui!</a>
        </div>
    </form>
    <?php
    ?>
</body>

</html>