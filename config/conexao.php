<?php 

class ConexaoBanco {
    private $conexao;

    public function __construct($dbhost, $dbUsername, $dbPassword, $dbName) {
        $this->conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

        if ($this->conexao->connect_error) {
            die("Conexão falhou: " . $this->conexao->connect_error);
        }
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function fecharConexao() {
        $this->conexao->close();
    }
}

// Uso da classe
$dbhost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'hemodialise';

$conexaoObjeto = new ConexaoBanco($dbhost, $dbUsername, $dbPassword, $dbName);
$conexao = $conexaoObjeto->getConexao();




 ?>