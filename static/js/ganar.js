$(document).ready(function (e) {
 
     
  Swal.fire({
    icon: 'success',
    title: 'Has ganado el juego felicitaciones!'
  })
  const myTimeout = setTimeout(redireccion, 2000);

  function redireccion() {
    window.location = "index.php?pagina=login";
  }


})