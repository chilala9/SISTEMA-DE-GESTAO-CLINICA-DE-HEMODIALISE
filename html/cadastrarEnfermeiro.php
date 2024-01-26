<?php
session_start();
// print_r($_SESSION);
// include '../../app/listarDeposito.php';

if (!isset($_SESSION['email']) == true and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../../config/validarLogin.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clínica de Hemodiálise</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
          <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">FUNCIONALIDADES</span>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="./listaEnfermeiro.php" aria-expanded="true">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Listar Agendar</span>
              </a>
            </li>
          
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Users</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../config/sair.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">SAIR</span>
              </a>
            </li>
       
          </ul>
          <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
               
              </div>
              <div class="unlimited-access-img">
                <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
             
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3"><?php $logados = $_SESSION['email'];
echo "$logados"; ?></p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="../../config/sair.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Sair</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Formulário para o Paciente</h5>
              <div class="card">
                <div class="card-body">

                <?php
                  include '../../config/conexao.php';
$id_paciente = $_GET['id_paciente'];
$dataAtual = $_GET['dataAtual'];
$horaAtual = $_GET['horaAtual'];
$idUsuario = $_SESSION['id_user'];

$sql = "SELECT * FROM PACIENTE WHERE id_paciente=$id_paciente";

$contaReceber = $conexao->query($sql);
?>


                    <?php

  if ($contaReceber->num_rows > 0) {
      while ($listD = $contaReceber->fetch_assoc()) {
          $id_paciente = $listD['id_paciente'];
          $nome = $listD['nome'];
          $dataNascimento = $listD['dataNascimento'];
          $sexo = $listD['sexo'];
          $endereco = $listD['endereco'];
          $telefone = $listD['telefone'];
          $dataAtendimento = $listD['dataAtendimento'];
          $horaAtendimento = $listD['horaAtendimento'];
      }
  } else {
      echo '<h3>Sem Registro</h3>';
  }

?>


                  <form action="../../config/cadastrarEnfermeiro.php" method="POST">

                  <input type="hidden" name="dataAtual" value="<?php echo $dataAtual ?? ''; ?>">
                  <input type="hidden" name="horaAtual" value="<?php echo $horaAtual ?? ''; ?>">
                  <input type="hidden" name="id_paciente" value="<?php echo $id_paciente ?? ''; ?>">
                  


                  <h5 class="card-title fw-semibold mb-4">Ficha De Atendimento </h5>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Código</label>
                      <input  type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo "$id_paciente"; ?>" readonly>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nome</label>
                      <input  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo "$nome"; ?>" readonly>
                      
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Data Nascimento</label>
                      <input type="date"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo "$dataNascimento"; ?>" readonly>
                     
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Sexo</label>
                     
                      <select  id="" class="form-control" readonly>
                        <option ><?php echo "$sexo"; ?></option readonly>
                        
                      </select>
                     
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Endereço</label>
                      <input type="text" name="endereco" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo "$endereco"; ?>" readonly>
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Telefone</label>
                      <input type="text" name="telefone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo "$telefone"; ?>" readonly>
                      
                    </div>

                    <h5 class="card-title fw-semibold mb-4">Marcado </h5>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Data</label>
                      <input type="date" name="dataFim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo "$dataAtendimento"; ?>" readonly>
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Hora</label>
                      <input type="text" name="horaFim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo " $horaAtendimento"; ?>" readonly>
                      
                    </div>



                    <h5 class="card-title fw-semibold mb-4">Preenchimento de enfermeiro </h5>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Análises(Imunologia-Bioquimica-Hematologia)</label>
                      <input type="text" name="sinais_vitais" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Peso Seco</label>
                      <input type="text" name="peso_seco" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Ultra Filtração</label>
                      <input type="text" name="ultra_filtracao" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                    <h5 class="card-title fw-semibold mb-4">Agendar com Médico </h5>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Data de atendimento</label>
                      <input type="date" name="dataFim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Hora de atendimento</label>
                      <input type="time" name="horaFim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                  </form>
                </div>
              </div>
             


             
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>