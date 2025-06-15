        <?php
        require_once 'shared/header.php';
        require_once 'controller/autenticationController.php';

        @session_start();
        if($_SESSION['tipo_usuario']==1){
             echo '<br> Bem vindo Adm';
        }else{
            echo '<br> Bem vindo cliente';
        }
        ?>

        <?php
        require_once 'shared/footer.php';
        ?>
  