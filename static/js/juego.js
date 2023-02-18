$(document).ready(function (e) {
  //creando objeto websocket
  var objeto_websocket = new WebSocket("ws://localhost:8080");
  var nombre_usuario = $("#usuario").val()
  var data
  var boton_1 = document.getElementById("1")
  var boton_2 = document.getElementById("2")
  var boton_3 = document.getElementById("3")
objeto_websocket.onmessage = function (e) {
  data = JSON.parse(e.data);
  console.log(data)



}
  
  $("#1").on('click',function(){

  boton_1.style.background = data.color
  })
$("#2").on('click',function(){

 boton_2.style.background = data.color
})
$("#3").on('click',function(){

  boton_3.style.background = data.color
})


  })