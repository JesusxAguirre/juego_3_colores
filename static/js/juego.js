$(document).ready(function (e) {
  //creando objeto websocket
  var objeto_websocket = new WebSocket("ws://localhost:8080");
  var nombre_usuario = $("#usuario").val()
  var data
  var boton_1 = document.getElementById("1")
  var boton_2 = document.getElementById("2")
  var boton_3 = document.getElementById("3")
  var usuarios
  objeto_websocket.onmessage = function (e) {
    data = JSON.parse(e.data);
    console.log(data)

    if (data.boton in ["1","2","3","ganar"]) {
      console.log("entra en el bulce")
      switch (data.boton) {
        case "1":
          boton_1.style.background = data.color
          break
        case "2":
          boton_2.style.background = data.color
          break
        case "3":
          boton_3.style.background = data.color
          break
        case "ganar":
          Swal.fire({
            icon: 'success',
            title: 'Felicidades has ganado el juego!!!!'
          })
        break
      }

      if (boton_1.style.background == boton_3.style.background && boton_1.style.background == boton_2.style.background ) {
        if(data.nombre == nombre_usuario){
          setTimeout(redireccion, 0000);
        }
        //objeto_websocket.send(JSON.stringify(ganar))
      }
    }
  }
  $("#1").on('click', function () {

    usuarios = {
      nombre: nombre_usuario,
      event: "gaming",
      id: data.id,
      color: data.color,
      boton: "1",
    }

    objeto_websocket.send(JSON.stringify(usuarios))


  })


  $("#2").on('click', function () {
    var usuarios = {
      nombre: nombre_usuario,
      event: "gaming",
      id: data.id,
      color: data.color,
      boton: "2",
    }
    objeto_websocket.send(JSON.stringify(usuarios))

  })


  $("#3").on('click', function () {
    var usuarios = {
      nombre: nombre_usuario,
      event: "gaming",
      id: data.id,
      color: data.color,
      boton: "3",
    }
    objeto_websocket.send(JSON.stringify(usuarios))

  })

  function redireccion() {
    window.location = "index.php?pagina=ganar";
  }
})