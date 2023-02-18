<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingresar como jugador</title>
  <link rel="stylesheet" href="static/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/css/login.css">

  <script src="static/js/jquery-3.6.0.min.js"></script>
  <script src="static/js/sweetalert2.js"></script>
</head>

<body class="h-100" style="background-color: #eee;">
  <div class="container" style="position: relative;">
    <div class="d-flex justify-content-center">

      <h1 <?php echo $_SESSION['jugador']; ?> A jugar!!! </h1>
      </div>
      <div class="d-flex justify-content-center">
      <div style="width: 5rem; height: 5rem; top: 25em; position: absolute;"  class="spinner-border text-warning mt-5" role="status">
        <span class="sr-only"></span>
      </div>
      </div>
   
  </div>
<input hidden type="text" value="<?php echo $_SESSION['jugador']; ?>">
<script src="static/js/juego.js"></script>
</body>

</html>