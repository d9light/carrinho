<?php

use Model\produtosModel;

class pedidosModel{
    
    protected $id;
    protected $dataCompra;
    protected $dataAprovacao;
    protected $valorTotal;
    protected $usuarioId;
  
    

    public function __construct()
    {
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of dataCompra
     */
    public function getDataCompra()
    {
        return $this->dataCompra;
    }

    /**
     * Set the value of dataCompra
     */
    public function setDataCompra($dataCompra): self
    {
        $this->dataCompra = $dataCompra;

        return $this;
    }

    /**
     * Get the value of dataAprovacao
     */
    public function getDataAprovacao()
    {
        return $this->dataAprovacao;
    }

    /**
     * Set the value of dataAprovacao
     */
    public function setDataAprovacao($dataAprovacao): self
    {
        $this->dataAprovacao = $dataAprovacao;

        return $this;
    }

    /**
     * Get the value of valorTotal
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * Set the value of valorTotal
     */
    public function setValorTotal($valorTotal): self
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    /**
     * Get the value of usuarioId
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set the value of usuarioId
     */
    public function setUsuarioId($usuarioId): self
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /*
    * $carrinho - Array de produtos selecionados
    */
    public function fecharPedido($carrinho){

      $con = new ConexaoMysql();
      $con->Conectar();

     //Consulta total do valor do pedido
     $produto = new produtosModel();
     
     $produto->sumTotalValue($carrinho);
      
      $sql = 'INSERT INTO pedidos VALUES (0,now(), null,'.$this->valorTotal.','.$this->usuarioId.')';

    $this->id = $con->Executar($sql);
    if($this->id > 0){
        //Deu tudo certo no cadastrar o pedido. Agora cadastro os itens do pedido.
        foreach ($carrinho as $item => $quantidade) {
            $itensPedido = new pedidosItensModel();
            $itensPedido->setItensId($item);
            $itensPedido->setQuantidade($quantidade);
            $itensPedido->setPedidosId($this->id);
            $itensPedido->save();
        }
    }        
      

      $con->Desconectar();


        return $con->total;
    }
}