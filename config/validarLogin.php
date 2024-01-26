<?php


session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){

    //Acessa
    include_once('conexao.php');
     $email = $_POST['email'];
     $senha = $_POST['senha'];



     $sql = "SELECT id_user FROM usuarios WHERE email = '$email' and senha = '$senha'";
     
     $result = $conexao->query($sql);



    

     if(mysqli_num_rows($result) < 1){
        unset($_SESSION['id_user']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../src/html/authentication-login.php?mensagem=Erro! Usuario inválido!');
     }else{
         $row = $result->fetch_assoc();
         $id = $row['id_user'];
        $_SESSION['id_user'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: ../src/html/index.php');
     }
     
}else{
    //Não vai ter acesso
    header('Location: ../src/html/authentication-login.php');
}
?>