<?php

require_once 'conexaoMysql.php';

class usuarioModel
{
    protected $id;
    protected $nome;
    protected $email;
    protected $senha;
    protected $tipo_usuario;
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getTipo_usuario()
    {
        return $this->tipo_usuario;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }
    public function setTipo_usuario($tipo_usuario): void
    {
        $this->tipo_usuario = $tipo_usuario;
    }
    public function insert()
    {
        //Criar um objeto de conexão
        $db = new ConexaoMysql();
        //Abrir conexão com banco de dados
        $db->Conectar();
        //Criar consulta
        //$this-> senha = md5($this->senha);
        $sql = 'INSERT INTO usuario values'
            . '(0,"' . $this->nome . '",'
            . '"' . $this->email . '",'
            . '"' . $this->senha . '",'
            . '"' . $this->tipo_usuario . '")';
        echo $sql;
        //Executar método de inserção
        $db->Executar($sql);
        //Desconectar do banco
        $db->Desconectar();
        return $db->total;
    }
    public function Autenticar($email, $senha)
    {
        $sql = 'SELECT * FROM usuario where email = "' . $email . '" and senha = "' . $senha . '" ';
        $db = new ConexaoMysql();
        $db->Conectar();
        echo $sql;
        $resultList = $db->Consultar($sql);
        $total = $db->total;
        $user = new usuarioModel();
        if($total>0){
            foreach ($resultList as $key => $value) {
                $this->id = $value['id'];
                $this->nome = $value['nome'];
                $this->tipo_usuario = $value['tipo_usuario_id'];
                $this->email = $value['email'];
            }
        }
        $db->Desconectar();
        return $this;
    }
}
