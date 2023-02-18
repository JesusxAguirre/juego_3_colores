$(document).ready(function (e) {
  //creando objeto websocket
  var objeto_websocket = new WebSocket("ws://localhost:8080");
 

objeto_websocket.onmessage = function (e) {
  var data = JSON.parse(e.data);
  console.log(data)

}
  
  })