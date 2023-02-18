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
    <div class="rowr">
    <input id="usuario" hidden type="text" value="<?php echo $_SESSION['jugador']; ?>">
    <h1><?php echo $_SESSION['resourceId'] ?></h1>
    <button id="1" type="button" style="margin-top: 20em; margin-left: 10px;" class="btn btn-light col-3">Presiona</button> 
    <button id="2" type="button" style="margin-top: 20em; margin-left: 10px;" class="btn btn-light col-3">Presiona</button> 
    <button id="3" type="button" style="margin-top: 20em; margin-left: 10px;" class="btn btn-light col-3">Presiona</button>
    </div>


  </div>

  <script src="static/js/juego.js"></script>
</body>

</html>