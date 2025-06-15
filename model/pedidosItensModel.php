<?php

class pedidosItensModel
{

    protected $id;
    protected $itensId;
    protected $pedidosId;
    protected $quantidade;



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
     * Get the value of itensId
     */
    public function getItensId()
    {
        return $this->itensId;
    }

    /**
     * Set the value of itensId
     */
    public function setItensId($itensId): self
    {
        $this->itensId = $itensId;

        return $this;
    }

    /**
     * Get the value of pedidosId
     */
    public function getPedidosId()
    {
        return $this->pedidosId;
    }

    /**
     * Set the value of pedidosId
     */
    public function setPedidosId($pedidosId): self
    {
        $this->pedidosId = $pedidosId;

        return $this;
    }

    /**
     * Get the value of quantidade
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     */
    public function setQuantidade($quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function save()
    {
        $con = new ConexaoMysql();
        $con->Conectar();

        $sql = 'INSERT INTO pedidos_itens VALUES (0,'.$this->itensId.','.$this->pedidosId.','.$this->quantidade.')';

        $con->Executar($sql);
        $con->Desconectar();
    }
}
