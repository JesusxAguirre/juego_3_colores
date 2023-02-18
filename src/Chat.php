<?php 
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Usuarios;


$usuarios= array();

$colores = array('#282E33', '#25373A', '#164852', '#495E67', '#FF3838');
class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct(){
      
      $this->clients = new \SplObjectStorage;
      $fecha_actual = date("d-m-Y h:i:s");
      
      echo "servidor arrancado! {($fecha_actual)} \n";
      
    }
  
    public function onOpen(ConnectionInterface $conn) {
      global $usuarios;
      $this->clients->attach($conn);
      $fecha_actual = date("d-m-Y h:i:s");
      //$usuarios["id_usuario"]=$conn->resourceId;

      if($usuarios[007]["2jugadores"]){
        
        foreach($this->clients as $client){
          $client->send(json_encode($usuarios));
        }
        unset($usuarios);
      }
      echo "Nueva conexion $fecha_actual ({$conn->resourceId})  \n";
    }
    

    public function onMessage(ConnectionInterface $from, $msg) {
       global $usuarios;
       global $colores;
       $numRecv = count($this->clients) - 1;
       echo sprintf('El usuario %d esta enviando el mensaje: "%s" to %d other connection%s' . "\n"
      , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
      
      
      $usuarios[$from->resourceId]=  json_decode($msg,true);
      $usuarios[$from->resourceId]["color"] =  $colores[array_rand($colores)];
    
      if(count($usuarios) ==2 ){
        $usuarios[007]["2jugadores"] = True;
      }

        if(count($this->clients) >= 2){
          foreach($this->clients as $client){
            $client->send(json_encode($usuarios));
          }
      }
    } 

    public function onClose(ConnectionInterface $conn) {
      global $data;
      $data[$conn->resourceId]["event"] = "left";
      $data[$conn->resourceId]["mensaje"] =  "el usuario {$conn->resourceId} se desconecto ";
     
      foreach($this->clients as $client){
        $client->send(json_encode($data[$conn->resourceId]));
      } 
      $this->clients->detach($conn);
      $fecha_actual = date("d-m-Y h:i:s");
      echo "el usuario {$conn->resourceId}  se ha desconectado $fecha_actual \n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
      echo "Ha ocurrido un error: {$e->getMessage()}\n";

      $conn->close();
    }
}
?>