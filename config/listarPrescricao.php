<?php

class ListarPrescricao
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTudo()
    {
        $sql = 'SELECT * FROM PRESCRICAO JOIN PACIENTE ON PRESCRICAO.id_paciente=PACIENTE.id_paciente  ORDER BY dataInicio DESC';

        return $this->conexao->query($sql);
    }
}

// Exemplo de uso
session_start();
include_once 'conexao.php';

$listar = new ListarPrescricao($conexao);

$prescricao1 = $listar->listarTudo();
