<?php
//require_once './controller/autenticationController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title>CRUD</title>
    </head>
    <body>

<ul
    class="nav nav-tabs"
>
    <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page"
            >Active</a
        >
    </li>
    
    <li class="nav-item">
        <a href="index.php" class="nav-link">Cadastro</a>
    </li>
    <li class="nav-item">
        <a href="produtos.php" class="nav-link">Produtos</a>
    </li>

    <li class="nav-item">
        <a style="color: red" href="controller/logoutcontroller.php?cod=logout" class="nav-link">Logout</a>
    </li>
</ul>

<br>

<main>
