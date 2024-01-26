<?php



class ListarPaciente
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTudo() {
        $sql = "SELECT * FROM PACIENTE  ORDER BY dataAtendimento DESC";
        return $this->conexao->query($sql);
    }


}



// Exemplo de uso
session_start();
include_once('conexao.php');

$listar = new ListarPaciente($conexao);

$resultado1 = $listar->listarTudo();
?>