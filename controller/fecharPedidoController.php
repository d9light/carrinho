<?php
if($_REQUEST){

$carrinho = $_SESSION['carrinho'];   
//Fechando pedido
$pedido = new pedidosModel();
$pedido->fecharPedido($carrinho);

}
?>