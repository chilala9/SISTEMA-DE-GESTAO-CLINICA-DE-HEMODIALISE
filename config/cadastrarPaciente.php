<?php



class CadastroPaciente
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastroPaciente($nome, $dataNascimento,  $sexo, $endereco, $telefone, $dataRegistro, $dataAtendimento, $horaAtendimneto)
    {
       

        $result = mysqli_query($this->conexao, "INSERT INTO PACIENTE (nome, dataNascimento, sexo, endereco, telefone, dataRegistro, horaRegistro, dataAtendimento, horaAtendimento) 
            VALUES ('$nome', '$dataNascimento', '$sexo', '$endereco', '$telefone','$dataRegistro', CURRENT_TIME(), '$dataAtendimento', '$horaAtendimneto')");

        if ($result) {
            header('Location: ../src/html/ui-card.php');
           
        } else {
            echo "Erro ao cadastrar a dívida.";
        }
    }
}

// Uso da classe

include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastroPaciente = new CadastroPaciente($conexao);

 
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $sexo = $_POST['sexo'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $dataAtendimento = $_POST['dataAtendiemento'];
        $horaAtendimneto = $_POST['horaAtendimento'];
       // Define o fuso horário desejado
        date_default_timezone_set('America/Sao_Paulo');

        // Obtém a data atual sem especificar um formato
        $dataAtual = date('Y-m-d');
        $dataRegistro =  $dataAtual;
       // Obtém a hora atual no formato 'H:i:s'
        $horaAtual = date('H:i:s', time());
        $horaRegistro= $horaAtual;

        echo"Teste1: $nome, $dataNascimento, $sexo, $endereco, $telefone, $dataRegistro, $horaRegistro, $dataAtendimento, $horaAtendimneto";

        $cadastroPaciente->cadastroPaciente($nome, $dataNascimento, $sexo, $endereco, $telefone, $dataRegistro, $dataAtendimento, $horaAtendimneto);
   
}

 

?>