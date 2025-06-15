<?php

namespace Model;

use ConexaoMysql;
require_once './Model/ConexaoMysql.php';
use Exception;

class produtosModel
{
    protected $nome;
    protected $descricao;
    protected $quantidade;
    protected $preco_custo;
    protected $preco_venda;
    protected $data_cadastro;
    protected $usuario_id;

    public function __construct()
    {
    }
   

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

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

    /**
     * Get the value of preco_custo
     */
    public function getPrecoCusto()
    {
        return $this->preco_custo;
    }

    /**
     * Set the value of preco_custo
     */
    public function setPrecoCusto($preco_custo): self
    {
        $this->preco_custo = $preco_custo;

        return $this;
    }

    /**
     * Get the value of preco_venda
     */
    public function getPrecoVenda()
    {
        return $this->preco_venda;
    }

    /**
     * Set the value of preco_venda
     */
    public function setPrecoVenda($preco_venda): self
    {
        $this->preco_venda = $preco_venda;

        return $this;
    }

    /**
     * Get the value of data_cadastro
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * Set the value of data_cadastro
     */
    public function setDataCadastro($data_cadastro): self
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     */
    public function setUsuarioId($usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function loadAll()
    {
        $con = new ConexaoMysql();
        $con->Conectar();

        $sql = 'SELECT * FROM itens;';

        $resultList = $con->Consultar($sql);

        return $resultList;
    }

    public function sumTotalValue(){
        
    }


}
