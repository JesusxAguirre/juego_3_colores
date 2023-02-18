$(document).ready(function (e) {
  //creando objeto websocket
  var objeto_websocket = new WebSocket("ws://localhost:8080");
  var nombre_usuario = $("#usuario").val()
  var color_usuario 
  var data
  var boton_1 = document.getElementById("1")
  var boton_2 = document.getElementById("2")
  var boton_3 = document.getElementById("3")
  var usuarios
  objeto_websocket.onmessage = function (e) {
    data = JSON.parse(e.data);
    

    if (data.event == "jugando") {
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
      }
    

      if(boton_1.style.background == usuarios.color &&  boton_2.style.background == usuarios.color && boton_3.style.background == usuarios.color)[
        objeto_websocket.send(JSON.stringify(usuarios))
      ]
    }
  }
  $("#1").on('click', function () {

     usuarios = {
      event: "jugando",
      id: data.id,
      color: data.color,
      boton: "1",
    }

    objeto_websocket.send(JSON.stringify(usuarios))


  })


  $("#2").on('click', function () {
    var usuarios = {
      event: "jugando",
      id: data.id,
      color: data.color,
      boton: "1",
    }
    objeto_websocket.send(JSON.stringify(usuarios))

  })


  $("#3").on('click', function () {
    var usuarios = {
      event: "jugando",
      id: data.id,
      color: data.color,
      boton: "1",
    }
    objeto_websocket.send(JSON.stringify(usuarios))

  })


})