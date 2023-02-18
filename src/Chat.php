<?php 
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Usuarios;


$usuarios= array();

$contador = 0;
class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct(){
      
      $this->clients = new \SplObjectStorage;
      $fecha_actual = date("d-m-Y h:i:s");
      
      echo "servidor arrancado! {($fecha_actual)} \n";
      
    }
  
    public function onOpen(ConnectionInterface $conn) {
      global  $contador;
      $contador++;
      $this->clients->attach($conn);
      $fecha_actual = date("d-m-Y h:i:s");
   

      if($contador >= 3){
        $background_colors = array('#AEF520', '#2026F5', '#DC1A75', '#DC1A1A', '#1ADC61');

        $count = count($background_colors) - 1;
    
        $i = rand(0, $count);
        echo "Entro a el bucle asdasdas ({$conn->resourceId})  \n";
        
          $usuarios["color"] =   $background_colors[$i];
          $usuarios["id"] = $conn->resourceId;
          $conn->send(json_encode($usuarios));
        
       
      }
      echo "Nueva conexion $fecha_actual ({$conn->resourceId})  \n";
    }
    

    public function onMessage(ConnectionInterface $from, $msg) {
      global $usuarios;
     

       $numRecv = count($this->clients) - 1;
       echo sprintf('El usuario %d esta enviando el mensaje: "%s" to %d other connection%s' . "\n"
      , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
      
      
      $usuarios[$from->resourceId]=  json_decode($msg,true);
     

    

        if(count($this->clients) >= 2){
          foreach($this->clients as $client){
            $client->send(json_encode($usuarios));
          }
      }
    } 

    public function onClose(ConnectionInterface $conn) {
    
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