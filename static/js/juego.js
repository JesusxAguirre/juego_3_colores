$(document).ready(function (e) {
  //creando objeto websocket
  var objeto_websocket = new WebSocket("ws://localhost:8080");
  var nombre_usuario = $("#usuario").val()

objeto_websocket.onmessage = function (e) {
  var data = JSON.parse(e.data);
  console.log(data)



}
  



  })