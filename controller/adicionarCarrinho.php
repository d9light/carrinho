<?php
// Array associativo para mapear produtoId para nome do produto
$produtos = array(
    "1" => "o PRODUTO FOI ",
    "2" => "",
    // Adicione mais produtos conforme necessário
);

//Verifico se existe query string chamada produtoId
if($_REQUEST['produtoId']){
    //Capturo o valor da query string produtoId e armazeno na var. local $produtoId
    $produtoId = $_REQUEST['produtoId'];
   
    //Mecanismo para criar o array
    @session_start();
    //Se não existir a sessão carrinho eu inicializo um array local.
    if(!isset($_SESSION['carrinho'])){
        $itens = array(); //criando o array itens
    }else{
        $itens = $_SESSION['carrinho'];
    }

    // Adiciona o produto ao carrinho
    array_push($itens, $produtoId);
  
    $_SESSION['carrinho'] = $itens;

    echo 'Produto '.$produtos[$produtoId].' adicionado.<br>';

    // Mostra o nome do array e a quantidade total de itens no carrinho
    echo 'Nome do array: carrinho<br>';
    echo 'Quantidade total de itens no carrinho: '.count($itens).'<br>';

    header('location:../produtos.php');
}
?>
