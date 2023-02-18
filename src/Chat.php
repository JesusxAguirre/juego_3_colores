<?php

namespace MyApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Usuarios;


$usuarios = array();
$usuarios_colores = array();
$contador = 0;
class Chat implements MessageComponentInterface
{
  protected $clients;

  public function __construct()
  {

    $this->clients = new \SplObjectStorage;
    $fecha_actual = date("d-m-Y h:i:s");

    echo "servidor arrancado! {($fecha_actual)} \n";
  }

  public function onOpen(ConnectionInterface $conn)
  {
    global  $contador;
    global  $usuarios_colores;
    $contador++;
    $this->clients->attach($conn);
    $fecha_actual = date("d-m-Y h:i:s");


    if ($contador >= 3) {
      $background_colors = array('#AEF520', '#2026F5', '#DC1A75', '#DC1A1A', '#1ADC61');

      $count = count($background_colors) - 1;

      $i = rand(0, $count);
      echo "Entro a el bucle asdasdas ({$conn->resourceId})  \n";

      $usuarios_colores[$conn->resourceId]["color"] =   $background_colors[$i];
      $usuarios_colores[$conn->resourceId]["event"] =   "gaming";
      $usuarios_colores[$conn->resourceId]["id"] = $conn->resourceId;
      $usuarios_colores[$conn->resourceId]["boton"] = "";
      $conn->send(json_encode($usuarios_colores[$conn->resourceId]));
    }
    echo "Nueva conexion $fecha_actual ({$conn->resourceId})  \n";
  }


  public function onMessage(ConnectionInterface $from, $msg)
  {
    global $usuarios;
    global $usuarios_colores;
    global $contador;
    $numRecv = count($this->clients) - 1;
    echo sprintf(
      'El usuario %d esta enviando el mensaje: "%s" to %d other connection%s' . "\n",
      $from->resourceId,
      $msg,
      $numRecv,
      $numRecv == 1 ? '' : 's'
    );


    $usuarios[$from->resourceId] =  json_decode($msg, true);



    if ($usuarios[$from->resourceId]['event'] == "iniciando juego") {
      if (count($this->clients) >= 2) {
        foreach ($this->clients as $client) {
          $client->send(json_encode($usuarios));
        }
      }
    }

    if ($contador >= 3) {
      if ($usuarios_colores[$from->resourceId]['event'] == "gaming") {
        $array_botones = json_decode($msg, true);

        $usuarios_colores[$from->resourceId]['boton'] = $array_botones['boton'];
        foreach ($this->clients as $client) {
          if ($array_botones['boton'] == "ganar") {

            $from->send($array_botones['id'], json_encode($array_botones));
          }
          $client->send(json_encode($usuarios_colores[$from->resourceId]));
        }
      }
    }
  }

  public function onClose(ConnectionInterface $conn)
  {

    $this->clients->detach($conn);
    $fecha_actual = date("d-m-Y h:i:s");
    echo "el usuario {$conn->resourceId}  se ha desconectado $fecha_actual \n";
  }

  public function onError(ConnectionInterface $conn, \Exception $e)
  {
    echo "Ha ocurrido un error: {$e->getMessage()}\n";

    $conn->close();
  }
}
