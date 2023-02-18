$(document).ready(function (e) {
  //creando objeto websocket
  var objeto_websocket = new WebSocket("ws://localhost:8080");
  var nombre_usuario = $("#usuario").val()
  var data
objeto_websocket.onmessage = function (e) {
  var data = JSON.parse(e.data);
  console.log(data)



}
  
$("#1").click(function(){

  $("1").css("background-color","" + data.color + "");
})
$("#2").click(function(){

  $("2").css("background-color","" + data.color + "");
})
$("#3").click(function(){

  $("3").css("background-color","" + data.color + "");
})


  })