<?php

use Model\produtosModel;

require_once 'shared/header.php';
require_once 'controller/autenticationController.php';
require_once 'model/produtosModel.php';

//Produtos
$produtos = new produtosModel();
$listaProdutos = $produtos->loadAll();

echo '<br>';
echo '<br>';
echo '<br>';


echo '<div class="container">';
echo '<div class="row">';
echo '<br>';
echo '<ul>';
foreach ($listaProdutos as $key => $produto) {
    echo '<li><a href="./controller/adicionarCarrinho.php?produtoId='.$produto['id'].'">'.$produto['nome'].'</a></li>';
}
echo '</ul>';

echo '<hr>';
echo '<h2>Carrinho tosco</h2>';

echo '<br>';

// Conta a quantidade de cada produto no carrinho
$contagemProdutos = array_count_values($_SESSION['carrinho']);

foreach ($contagemProdutos as $produtoId => $quantidade) {
    // Busca o nome do produto na lista de produtos
    foreach ($listaProdutos as $produto) {
        if ($produto['id'] == $produtoId) {
            echo ''.$produto['nome'].' foi adicionado '. $quantidade. ' vezes no carrinho.<br>';
            break;
        }
    }
}
echo '</div>'; // Fim da row
echo '</div>'; // Fim do container

require_once 'shared/footer.php';
?>
