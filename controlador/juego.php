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


   
    require_once 'vista/'.$pagina.'.php';
}else {
    echo "Pagina en contruccion";
}
?>