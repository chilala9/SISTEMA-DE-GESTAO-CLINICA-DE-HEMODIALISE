<?php
include '../../config/listarSessao.php';

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
              <a class="sidebar-link" href="./listaMedico.php" aria-expanded="true">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Monitorar Sessões</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./listaPrescricao.php" aria-expanded="true">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Listar Prescrições</span>
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
              <div class="row">
                
               
               
              </div>
            </div>




            <div class="col-lg-8 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body p-4">
                  <h5 class="card-title fw-semibold mb-4">Lista de Pacientes</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Código</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nome Paciente</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Data Nascimento</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Sexo</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Sinais Vitais</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Peso Seco</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Ultra Filtração</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Data Agendada</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Hora Agendada</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">ACÇÃO</h6>
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>


                      <?php

    if ($sessao1->num_rows > 0) {
        while ($listL = $sessao1->fetch_assoc()) {
            $dataAtual = date('Y-m-d');
            // Obter a hora atual
            $horaAtual = date('H:i:s');

            echo '<tr>';
            echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0'>{$listL['id_sessao']}</h6></td>";
            echo "<td class='border-bottom-0'>";
            echo "  <h6 class='fw-semibold mb-1'>{$listL['nome']}</h6>";

            echo "<td class='border-bottom-0'>";
            echo "<h6 class='fw-semibold mb-0 fs-4'>{$listL['dataNascimento']}</h6>";
            echo '</td>';
            echo "<td class='border-bottom-0'>";
            echo "<h6 class='fw-semibold mb-0 fs-4'>{$listL['sexo']}</h6>";
            echo '</td>';
            echo "<td class='border-bottom-0'>";
            echo "<h6 class='fw-semibold mb-0 fs-4'>{$listL['sinais_vitais']}</h6>";
            echo '</td>';
            echo "<td class='border-bottom-0'>";
            echo "<h6 class='fw-semibold mb-0 fs-4'>{$listL['peso_seco']}</h6>";
            echo '</td>';

            echo "<td class='border-bottom-0'>";
            echo "<h6 class='fw-semibold mb-0 fs-4'>{$listL['ultra_filtracao']}</h6>";
            echo '</td>';
            echo "<td class='border-bottom-0'>";
            echo " <div class='d-flex align-items-center gap-2'>";
            echo "<span class='badge bg-primary rounded-3 fw-semibold'>{$listL['dataFim']}</span>";
            echo '</div>';
            echo '</td>';
            echo "<td class='border-bottom-0'>";
            echo " <div class='d-flex align-items-center gap-2'>";
            echo "<span class='badge bg-primary rounded-3 fw-semibold'>{$listL['horaFim']}</span>";
            echo '</div>';
            echo '</td>';
        }
    } else {
        echo "<h3>Não existe valor a ''RECEBER'' registrado</h3>";
    }

?>
                       
                             
                                            
                      </tbody>
                    </table>
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