<?php

class Medico
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastroPaciente($id_paciente, $id_user, $id_equipamento, $dataRegistro, $medicamentos, $fluxo_sangue, $tempo_dialise, $estado)
    {
        $result = mysqli_query($this->conexao, "INSERT INTO PRESCRICAO (id_paciente, id_user, id_equipamento, dataInicio, horaInicio, medicamentos,  fluxo_sangue, tempo_dialise, estado_medico) 
            VALUES ($id_paciente, $id_user, '$id_equipamento', '$dataRegistro', CURRENT_TIME(), '$medicamentos','$fluxo_sangue', '$tempo_dialise', $estado)");

        if ($result) {
            header('Location: ../src/html/listaPrescricao.php');
        } else {
            echo 'Erro ao cadastrar a dívida.';
        }
    }
}

// Uso da classe

include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $cadastroPaciente = new Medico($conexao);

    $id_user = $_SESSION['id_user'];
    $id_equipamento = $_POST['id_equipamento'];
    $medicamentos = $_POST['medicamentos'];
    $fluxo_sangue = $_POST['fluxo_sangue'];
    $tempo_dialise = $_POST['tempo_dialise'];
    $id_paciente = $_POST['id_paciente'];

    $estado = 1;
    // Define o fuso horário desejado
    date_default_timezone_set('America/Sao_Paulo');

    /* // Obtém a data atual sem especificar um formato */
    $dataAtual = date('Y-m-d');
    $dataRegistro = $dataAtual;
    /* Obtém a hora atual no formato 'H:i:s'
     $horaAtual = date('H:i:s', time());
     $horaRegistro= $horaAtual;*/

    // echo"Teste1: $nome, $dataNascimento, $sexo, $endereco, $telefone, $dataRegistro, $horaRegistro, $dataAtendimento, $horaAtendimneto";

    $cadastroPaciente->cadastroPaciente($id_paciente, $id_user, $id_equipamento, $dataRegistro, $medicamentos, $fluxo_sangue, $tempo_dialise, $estado);
}
