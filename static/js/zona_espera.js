$(document).ready(function (e) {
//creando objeto websocket
var objeto_websocket = new WebSocket("ws://localhost:8080");
var contador = 0


objeto_websocket.onopen = function (e) {//cuando la conexion se abre 
    contador +=1

    if(contador >= 2){
        window.location = "index.php?pagina=juego"
    }

}



})
