$(document).ready(function (e) {
//creando objeto websocket
var objeto_websocket = new WebSocket("ws://localhost:8080");
var contador = 0
var nombre_usuario = $("#usuario").val()


objeto_websocket.onopen = function (e) {//cuando la conexion se abre 
    contador +=1

    if(contador == 2){
        contador =0
        
        var data{
            nombre_usuario = nombre_usuario
        }
        console.log(data)
        objeto_websocket.send(JSON.stringify(data))
    }

}



})
