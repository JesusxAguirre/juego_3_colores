$(document).ready(function (e) {
//creando objeto websocket
var objeto_websocket = new WebSocket("ws://localhost:8080");

var nombre_usuario = $("#usuario").val()


objeto_websocket.onopen = function (e) {//cuando la conexion se abre 
        
        var data = {
            event: "iniciando juego",
            nombre_usuario: nombre_usuario,
        }
        console.log(data)
        objeto_websocket.send(JSON.stringify(data))
}


objeto_websocket.onmessage = function (e) {
    console.log(e.data);
    var data = JSON.parse(e.data);
    console.log(data)

    if(data.nombre_usuario == nombre_usuario){
    window.location = "index.php?pagina=juego";
    }
  }



})
