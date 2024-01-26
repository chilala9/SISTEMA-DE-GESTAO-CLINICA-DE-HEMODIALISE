<?php

class ListarPaciente
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarTudo()
    {
        $sql = 'SELECT * FROM SESSAO JOIN PACIENTE ON SESSAO.id_paciente = PACIENTE.id_paciente ORDER BY dataFim DESC';

        return $this->conexao->query($sql);
    }
}

// Exemplo de uso
session_start();
include_once 'conexao.php';

$listar = new ListarPaciente($conexao);

$sessao1 = $listar->listarTudo();
