<?php
include '../../config/conexao.php';
include '../../config/totalPaciente.php';

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
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
     

    
           
          <?php
                  // include '../../config/conexao.php';

                      $idUsuario = $_SESSION['id_user'];

$sql = "SELECT * FROM USUARIOS WHERE id_user=$idUsuario";

$contaReceber = $conexao->query($sql);
?>


                  <?php

if ($contaReceber->num_rows > 0) {
    while ($listD = $contaReceber->fetch_assoc()) {
        if ($listD['tipo'] == 'admin') {
            echo "<span class='hide-menu'>ADMIN <br/><br/></span>";
            echo "<span class='hide-menu'>{$listD['nome']} </span>";

            echo " <li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>Home</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./index.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-layout-dashboard'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Dashboard</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>FUNCIONALIDADES</span>";
            echo '</li>';

            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./equipamento.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-file-description'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Cadastrar Equipamento</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./ui-forms.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-file-description'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Cadastrar Paciente</span>";
            echo '</a>';
            echo '</li>';

            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./ui-card.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Listar Paciente</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listarEquipamento.php' aria-expanded='false'>";
            echo '<span>';
            echo " <i class='ti ti-cards'></i>";
            echo ' </span>';
            echo "<span class='hide-menu'>Listar Equipamento</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listaEnfermeiro.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Agendar Tratamento</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listaMedico.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Monitorar Sessões</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listaPrescricao.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Listar Prescrições</span>";
            echo '</a>';
            echo '</li>';

            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>USERS</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='../../config/sair.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-login'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>SAIR</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./authentication-register.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-user-plus'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Registrar user</span>";
            echo '</a>';
            echo '</li>';
        } elseif ($listD['tipo'] == 'Recepcionista') {
            echo "<span class='hide-menu'>Recepcionista <br/><br/></span>";
            echo "<span class='hide-menu'>{$listD['nome']} </span>";

            echo " <li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>Home</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./index.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-layout-dashboard'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Dashboard</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>FUNCIONALIDADES</span>";
            echo '</li>';

            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./equipamento.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-file-description'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Cadastrar Equipamento</span>";
            echo '</a>';
            echo '</li>';

            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./ui-forms.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-file-description'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Cadastrar Paciente</span>";
            echo '</a>';
            echo '</li>';

            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./ui-card.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Listar Paciente</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listarEquipamento.php' aria-expanded='false'>";
            echo '<span>';
            echo " <i class='ti ti-cards'></i>";
            echo ' </span>';
            echo "<span class='hide-menu'>Listar Equipamento</span>";
            echo '</a>';
            echo '</li>';

            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>USERS</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='../../config/sair.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-login'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>SAIR</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./authentication-register.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-user-plus'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Registrar user</span>";
            echo '</a>';
            echo '</li>';
        } elseif ($listD['tipo'] == 'Enfermeiro') {
            echo "<span class='hide-menu'>Enfermeiro(a) <br/><br/></span>";
            echo "<span class='hide-menu'>{$listD['nome']} </span>";

            echo " <li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>Home</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./index.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-layout-dashboard'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Dashboard</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>FUNCIONALIDADES</span>";
            echo '</li>';

            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listaEnfermeiro.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Agendar Tratamento</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listaSessao.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Listar Sessões</span>";
            echo '</a>';
            echo '</li>';

            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>USERS</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='../../config/sair.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-login'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>SAIR</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./authentication-register.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-user-plus'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Registrar user</span>";
            echo '</a>';
            echo '</li>';
        } elseif ($listD['tipo'] == 'Medico') {
            echo "<span class='hide-menu'> Medico(a)  </span> <br/> <br/>";
            echo "<span class='hide-menu'>{$listD['nome']} </span>";

            echo " <li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>Home</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./index.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-layout-dashboard'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Dashboard</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>FUNCIONALIDADES</span>";
            echo '</li>';

            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listaMedico.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Monitorar Sessões</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./listaPrescricao.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-cards'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Listar Prescrições</span>";
            echo '</a>';
            echo '</li>';

            echo "<li class='nav-small-cap'>";
            echo "<i class='ti ti-dots nav-small-cap-icon fs-4'></i>";
            echo "<span class='hide-menu'>USERS</span>";
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='../../config/sair.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-login'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>SAIR</span>";
            echo '</a>';
            echo '</li>';
            echo "<li class='sidebar-item'>";
            echo "<a class='sidebar-link' href='./authentication-register.php' aria-expanded='false'>";
            echo '<span>';
            echo "<i class='ti ti-user-plus'></i>";
            echo '</span>';
            echo "<span class='hide-menu'>Registrar user</span>";
            echo '</a>';
            echo '</li>';
        } else {
            header('Location: ../src/html/authentication-login.php?mensagem=Erro! Usuario inválido!');
        }
    }
} else {
    echo '<h3>Sem Registro</h3>';
}

?>


          


          



           
            
           
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
                      <p class="mb-0 fs-3"><?php $logados = $_SESSION['email'];
echo "$logados"; ?></p>
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
        <!--  Row 1 -->
       
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                
              </div>
              <div class="col-lg-12">
                <!-- Monthly Earnings -->
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                     
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            
                         <?php

    if ($totalDia->num_rows > 0) {
        while ($listD = $totalDia->fetch_assoc()) {
            echo " <p>{$listD['totalDia']}</p>";
        }
    } else {
        echo '<h3>Sem Registro</h3>';
    }

?>
                           
                           
                          </div>
                        </div>
                      </div>
                      <p>Total Paciente atendido por Dia</p>
                    </div>
                  </div>
                  <div id="earning"></div>
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
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>