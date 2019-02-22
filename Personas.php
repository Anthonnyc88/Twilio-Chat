<?php
require __DIR__.'/twilio-php-master/Twilio/autoload.php';
require __DIR__.'/twilio-php-master/vendor/autoload.php';
require __DIR__.'/twilio-php-master/Services/Twilio.php';
use Twilio\Rest\Client;
class Personas{
        public $variable;
        public $variableM;
        public $Usuario;
        public $Mensaje;


        function __construct($variable,$variableM,$Usuario,$Mensaje){
            $this->variable= $variable;    
            $this->variableM= $variableM;      
            $this->Usuario= $Usuario;     
            $this->Mensaje= $Mensaje;     
        }
   
    
        function Canal_Usuario(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $channels = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075") ->channels ->read(); 
        $output = '';
        foreach ($channels as $record) {
        $output .= "
       
        <form action='Mensajes.php' method='post'>
        <input type='hidden' id='id' name='id' value='$record->sid'></input>
        <input type='hidden' id='nombre' name='nombre' value='$record->friendlyName'></input>
        <li>$record->friendlyName<a href='' class='dropdown-toggle' data-toggle='dropdown'><button type='submit' >Unirme</button></a>
        <ul class='dropdown-menu'>
        <h4><a href='' class='scrollto' value=''></a></h4>
        <input type='text' class='form-control' id='Usuario' name='Usuario' placeholder='Usuario'>
        <input type='submit'  value='Unirme'>
        </ul>
        </form>
      
        "; 
        }
        echo $output;
        }
    
        function Listar_Usuario_Canal(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $members = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")->channels("CH3ae7c1b0de004240822b69619aeb84b7")->members->read();
        foreach ($members as $record) {
        print($record->identity."   " );
        }        
        }
        
        function  Unir_Usuario_Canal(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $member = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")->channels($this->variableM)->members->create($this->Usuario);       
        print($member->identity);
        }
        function MostrarFN(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $members = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")
        ->channels($this->variableM)
        ->members
        ->read();
        foreach ($members as $record) {
        print($record->identity."--");        
        }    
        }
   
        function EnviarMns(){
      if($this->Mensaje != "H"){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $message = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")->channels($this->variableM)->messages->create(array("body" => $this->Mensaje, "from"=>$this->Usuario));   
        
        
        }
       
                     
        }
         
        function ListarMns(){
            $sid = "ACd962212640de91c9eee3c217c2d5e067";
            $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $messages = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")->channels($this->variableM)->messages->read();
        $message = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")->channels($this->variableM)->messages->create(array("body" => $this->Mensaje, "from"=>$this->Usuario));
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
