<?php



class Enferneiro
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastroPaciente($id_paciente, $id_user,  $dataInicio, $horaInicio, $sinais_vitais, $peso_seco, $ultra_filtracao, $dataFim, $horaFim)
    {
       

        $result = mysqli_query($this->conexao, "INSERT INTO SESSAO (id_paciente, id_user, dataInicio, horaInicio, sinais_vitais, peso_seco, ultra_filtracao, dataFim, horaFim) 
            VALUES ($id_paciente, $id_user, '$dataInicio', '$horaInicio', '$sinais_vitais','$peso_seco', '$ultra_filtracao', '$dataFim', '$horaFim')");

        if ($result) {
            header('Location: ../src/html/listaSessao.php');
           
        } else {
            echo "Erro ao cadastrar a dívida.";
        }
    }

    public function estadoPaciente($id_paciente){
        $result = mysqli_query($this->conexao, "UPDATE PACIENTE SET estadoP=1 WHERE id_paciente=$id_paciente"
        
        
        );

    }
}

// Uso da classe

include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $cadastroPaciente = new Enferneiro($conexao);

        $id_user = $_SESSION['id_user'];
        $dataAtual = $_POST['dataAtual'];
        $horaAtual = $_POST['horaAtual'];
        $sinais_vitais = $_POST['sinais_vitais'];
        $peso_seco = $_POST['peso_seco'];
        $ultra_filtracao = $_POST['ultra_filtracao'];
        $dataFim = $_POST['dataFim'];
        $horaFim = $_POST['horaFim'];
        $id_paciente = $_POST['id_paciente'];
       // Define o fuso horário desejado
        date_default_timezone_set('America/Sao_Paulo');

        /*// Obtém a data atual sem especificar um formato
        $dataAtual = date('Y-m-d');
        $dataRegistro =  $dataAtual;
       // Obtém a hora atual no formato 'H:i:s'
        $horaAtual = date('H:i:s', time());
        $horaRegistro= $horaAtual;*/

        //echo"Teste1: $nome, $dataNascimento, $sexo, $endereco, $telefone, $dataRegistro, $horaRegistro, $dataAtendimento, $horaAtendimneto";

        $cadastroPaciente->cadastroPaciente($id_paciente, $id_user, $dataAtual, $horaAtual, $sinais_vitais, $peso_seco, $ultra_filtracao, $dataFim, $horaFim);
        $cadastroPaciente->estadoPaciente($id_paciente);
}

 

?>