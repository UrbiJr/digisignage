<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ProjectWork</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="./js/jquery-3.3.1/jquery-3.3.1.min.js"></script>
  <script src="./js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <style>
  input[type='file']{
    color: transparent;
  }
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php?model=login&action=home"><img src="images/logone.png"  width="200" height="50"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
          <a class="nav-link" href="#">
            <i class="nav-link" href="#"><img src="images/loghino.png" width="20" height="20"><span class="nav-link-text">MENU</span></i>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="index.php?model=risorsa_documento&action=new" onclick="getNameDashboard('Carica Risorsa)';">
            <i class="fa fa-arrow-circle-o-up"></i>
            <span class="nav-link-text">Carica Risorsa</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="index.php?model=sequenza&action=start" onclick="document.getElementById('bar_dash').innerHTML='Ordina';">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Ordina</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="index.php?model=risorsa_documento&action=list" onclick="document.getElementById('bar_dash').innerHTML='Visualizza';">
            <i class="fa fa-eye"></i>
            <span class="nav-link-text">Visualizza</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
           <a class="nav-link" href="#" onclick="document.getElementById('bar_dash').innerHTML='Gestisci Gruppo';">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Gestisci Gruppo</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
           <a class="nav-link" href="index.php?model=dispositivo&action=list" onclick="document.getElementById('bar_dash').innerHTML='Gestisci Dispositivi';">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Gestisci Dispositivi</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">utente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?model=login&action=logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

    </div>
    <?php echo $content ?>
  </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="./js/jquery-3.3.1/jquery-3.3.1.min.js"></script>
    <script src="./js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popp     er.js/1.12.9/umd/popper.min.js"></script>

    <script src="./js/main.js"></script>
    <script src="./js/sortable.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
