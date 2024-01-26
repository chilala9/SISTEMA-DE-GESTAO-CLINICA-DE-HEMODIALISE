<?php

class CadastroPaciente
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastroPaciente($nome, $descricao)
    {
        $result = mysqli_query($this->conexao, "INSERT INTO EQUIPAMENTO (nome_equipamento, descricao) 
            VALUES ('$nome', '$descricao')");

        if ($result) {
            header('Location: ../src/html/listarEquipamento.php');
        } else {
            echo 'Erro ao cadastrar a dívida.';
        }
    }
}

// Uso da classe

include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastroPaciente = new CadastroPaciente($conexao);

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    // echo"Teste1: $nome, $dataNascimento, $sexo, $endereco, $telefone, $dataRegistro, $horaRegistro, $dataAtendimento, $horaAtendimneto";

    $cadastroPaciente->cadastroPaciente($nome, $descricao);
}
