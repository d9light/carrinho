<?php
if($_POST){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //@$nome = $_POST['nome'];
    //$tipo_usuario = $_POST['tipo_usuario'];
    //@$id = $_POST['id'];
    require_once '../model/usuarioModel.php';
    $usuario = new usuarioModel();
    //se o usuario informar email e senha autentica
    if(!empty($email) && !empty($senha)){
        $usuario->Autenticar($email, $senha);
        //Adm
        session_start();
        $_SESSION['login'] = $usuario->getId();
        $_SESSION['tipo_usuario'] = $usuario->getTipo_usuario();
        //if($usuario->getTipo_usuario()==1){
            header('location:../menu.php');
        //}else{
           // echo $usuario->getTipo_usuario();
        //}
    }else{
        header('location:../login.php');
    }
        
        
        
}