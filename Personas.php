<?php
require __DIR__.'/twilio-php-master/Twilio/autoload.php';
require __DIR__.'/twilio-php-master/vendor/autoload.php';
require __DIR__.'/twilio-php-master/Services/Twilio.php';
use Twilio\Rest\Client;
class Personas{
        public $nombre;
        public $id;
        public $usuario;
        public $mensaje;


        function __construct($nombre,$id,$usuario,$mensaje){
            $this->nombre= $nombre;    
            $this->id= $id;      
            $this->usuario= $usuario;     
            $this->mensaje= $mensaje;     
        }
   
    //--------------------------------------------------------------------------Seccion Canal---------------------------------------------------------------------------------------
        
        function Canal_Usuario(){
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $channels = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342") ->channels ->read(); 
        $output = '';
        foreach ($channels as $record) {
        $output .= "
        <table style='width:10%'>
        <form action='Mensajes.php' method='post'>
        <input type='hidden' id='id' name='id' value='$record->sid'></input>
        <input type='hidden' id='nombre' name='nombre' value='$record->friendlyName'></input>
        <li>$record->friendlyName
        <h4><a href=''  value=''></a></h4>
        <input type='text' id='Usuario' name='Usuario' placeholder='User'>
        <input type='submit'  value='Unirme'>
        </ul>
        </form>
        </table>
        "; 
        }
        echo $output;
        }
    
        function Listar_Usuario_Canal(){
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $members = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels("CH3ae7c1b0de004240822b69619aeb84b7")->members->read();
        foreach ($members as $record) {
        print($record->identity."   " );
        }        
        }
        function  Unir_Usuario_Canal(){
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $member = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels($this->variableM)->members->create($this->Usuario);       
        print($member->identity);
        }
        function MostrarFN(){
            $sid    = "ACd962212640de91c9eee3c217c2d5e067";
            $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $members = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")
        ->channels($this->variableM)
        ->members
        ->read();
        foreach ($members as $record) {
        print($record->identity."--");        
        }    
        }
    
        function EnviarMns(){
      if($this->Mensaje != "H"){
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $message = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels($this->variableM)->messages->create(array("body" => $this->Mensaje, "from"=>$this->Usuario));   
        
        
        }
       
                     
        }
        
        function ListarMns(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $messages = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels($this->variableM)->messages->read();
        $message = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels($this->variableM)->messages->create(array("body" => $this->Mensaje, "from"=>$this->Usuario));
        $fecha = "";
        foreach ($messages as $record){
        $output='';
        $output .= "
        $record->from : $record->body
        ";
        echo $output;
        echo $message->dateCreated->format("d-m-Y H:i:s");
        }
        }

    }
?>
