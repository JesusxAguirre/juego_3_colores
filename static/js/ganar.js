$(document).ready(function (e) {
 
     
  Swal.fire({
    icon: 'success',
    title: 'Te has unido al juego correctamente'
  })
  const myTimeout = setTimeout(redireccion, 2000);

  function redireccion() {
    window.location = "index.php?pagina=login";
  }


})