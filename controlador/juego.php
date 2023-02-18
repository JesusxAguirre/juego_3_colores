<?php
session_start();
if ($_SESSION['jugador']){
	
} else {
    echo "<script>
    alert('Debes iniciar sesion');
    window.location= 'index.php?pagina=login'
    </script>";
}

if (is_file('vista/'.$pagina.'.php')) {

  echo $_SESSION['jugador'];
  if(isset($_POST['jugar'])){
    $_SESSION['id'] = $_POST['id'];
  }
    require_once 'vista/'.$pagina.'.php';
}else {
    echo "Pagina en contruccion";
}
?>