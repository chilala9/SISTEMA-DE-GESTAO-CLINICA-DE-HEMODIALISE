<?php



class ListarDia
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTudo($dataRegistro) {
        $sql = "SELECT COUNT(sexo) AS totalDia FROM PACIENTE WHERE dataRegistro = '$dataRegistro'";
        return $this->conexao->query($sql);
    }


}



// Exemplo de uso
session_start();
include_once('conexao.php');

 /*// Obtém a data atual sem especificar um formato*/
 $dataAtual = date('Y-m-d');
 $dataRegistro =  $dataAtual;
 

$listar = new ListarDia($conexao);

$totalDia = $listar->listarTudo($dataRegistro);
?>