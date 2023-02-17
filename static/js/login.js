const formulario = document.getElementById('formulario'); //declarando una constante con la id formulario
const inputs = document.querySelectorAll('#formulario input'); //declarando una constante con todos los inputs dentro de la id formulario


const expresiones = { //objeto con varias expresiones regulares
 
  nombre: /^[a-zA-ZÀ-ÿ\s]{5,20}$/,
  //expresion regular de codigo de usuario
}

const campos = {

  nombre: false,

}
const ValidarFormulario = (e) => {
  switch (e.target.name) {
  
    case "nombre":
      ValidarCampo(expresiones.nombre, e.target, 'nombre');
      break;

  }
}
const ValidarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.querySelector(`#grupo__${campo} i`).classList.remove('bi', 'bi-exclamation-triangle-fill', 'text-danger', 'input-icon');
    document.querySelector(`#grupo__${campo} p`).classList.remove('d-block');
    document.querySelector(`#grupo__${campo} i`).classList.add('bi', 'bi-check-circle-fill', 'text-check', 'input-icon2');
    document.querySelector(`#grupo__${campo} p`).classList.add('d-none');
    campos[campo] = true;
  } else {
    document.querySelector(`#grupo__${campo} i`).classList.remove('bi', 'bi-check-circle-fill', 'text-check', 'input-icon2');
    document.querySelector(`#grupo__${campo} p`).classList.remove('d-none');
    document.querySelector(`#grupo__${campo} i`).classList.add('bi', 'bi-exclamation-triangle-fill', 'text-danger', 'input-icon');
    document.querySelector(`#grupo__${campo} p`).classList.add('d-block');
    campos[campo] = false;
  }
}


inputs.forEach((input) => {
  input.addEventListener('keyup', ValidarFormulario);
  input.addEventListener('blur', ValidarFormulario);
});


formulario.addEventListener('submit', (e) => {
  if (!(campos.nombre )) {
    e.preventDefault();
    Swal.fire({
      icon: 'error',
      title: 'Lo siento ',
      text: 'No puedes entrar sin un nombre de jugador'
    })
  }
})



if (error == false) { 
  Swal.fire({
    icon: 'success',
    title: 'Te has unido al juego correctamente'
  })
  const myTimeout = setTimeout(redireccion, 2000);
}
  function redireccion() {
    window.location = "index.php?pagina=zona_espera.php";
  }