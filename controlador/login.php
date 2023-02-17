<?php
session_start();


if (is_file('vista/'.$pagina.'.php')) {
    $error = true;
    if(isset($_POST['jugar'])){
    $_SESSION['jugador'] = $_POST['nombre'];
    $error = false;
  }
    require_once 'vista/'.$pagina.'.php';
}else {
    echo "Pagina en contruccion";
}
?>