<?php

class CadastroUsuario
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastrarNovoUsuario($nome, $email, $senha, $tipo)
    {
        // Verificar se o e-mail já existe na tabela
        $verifica_email = mysqli_query($this->conexao, "SELECT * FROM usuarios WHERE email = '$email'");

        if (mysqli_num_rows($verifica_email) > 0) {
            // E-mail já existe, faça o tratamento adequado, como exibir uma mensagem de erro
            header('Location: ../templets/template/pages/samples/register.php?mensagem=Erro! Email já existe!');
        } else {
            // E-mail não existe, então proceda com a inserção
            $result = mysqli_query($this->conexao, "INSERT INTO usuarios(nome, email, senha, tipo) 
                VALUES ('$nome', '$email', '$senha', '$tipo')");

            if ($result) {
                // Inserção bem-sucedida, redirecionar para a página de login
                header('Location: ../src/html/index.php');
            } else {
                // Tratar erro na inserção, como exibir uma mensagem de erro
                echo 'Erro ao cadastrar usuário.';
            }
        }
    }
}

// Uso da classe
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastroUsuario = new CadastroUsuario($conexao);

    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['tipo'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];

        $cadastroUsuario->cadastrarNovoUsuario($nome, $email, $senha, $tipo);
    }
}
?>

