<?php
require __DIR__.'/twilio-php-master/Twilio/autoload.php';
require __DIR__.'/twilio-php-master/vendor/autoload.php';
require __DIR__.'/twilio-php-master/Services/Twilio.php';
use Twilio\Rest\Client;
class Canal{
    public $variable;
    public $variableM;
    function __construct($variable,$variableM){
        $this->variable= $variable;    
        $this->variableM= $variableM;      
    }
    //-----------------------------------------------------------------------Seccion Servicios------------------------------------------------------------------------
    //Crear Servicio
    function Crear_Servicio(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);

    $service = $twilio->chat->v2->services
                        ->create("Servicio_Twilio");

    print($service->sid);
    }

    //Vista de los servicios creados
    function Ver_Servicio(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);

    $services = $twilio->chat->v2->services
                        ->read();

    foreach ($services as $record) {
    print($record->friendlyName);
    }
}

    function Ver_Canal(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);
    $channels = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")
    ->channels
    ->read();
    $output = '';
    foreach ($channels as $record) {
    $output .= "
    <table style='width:100%'>
    <tr>
    <th><td>$record->friendlyName</td></th>
    
    <form action='Canal_Update.php' method='post'>
    <th><td><input type='hidden' id='id' name='id' value='$record->sid'></input></td></th>
    
    <td>
    <li><a href='' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span><button type='button' class='btn btn-primary btn-xs'>Modificar</button></a>
    <ul class='dropdown-menu'>
    <h5><a href='' class='scrollto'><span>Nombre</span> del</a><span>Canal</span></h5>
    <input type='text' class='form-control' id='nombre' name='nombre'>
    <input type='submit' class='btn btn-primary'  value='Actualizar'>
    </ul>
    </li>
    </td>



    </form> 
    <form action='Canal_Delect.php' method='post'>
    <th><td><input type='hidden' id='eliminar' name='eliminar' value='$record->sid'></input></td></th>
    <th><td><button type='submit' class='btn btn-danger'>Eliminar</button></td></th>            
    </form>           
    </tr>
    </table>
    ";   
    }
    echo $output;
    }
    //Metodo eliminar canal
    function Eliminar_Canal(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
    $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        
        $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")
                         ->channels($this->variable)
                         ->delete();
    } 
    //Metodo crear canal
    function Crear_Canal(){ 
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $channel = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")
                                    ->channels
                                    ->create(array("friendlyName" => $this->variable));
    }
    //Metodo modificar canal
    function Modificar_Canal(){
        $sid = "ACd962212640de91c9eee3c217c2d5e067";
        $token= "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $channel = $twilio->chat->v2->services("IS898de6ec424d4934afadb10306f97075")->channels("$this->variable")->update(array("friendlyName" => "$this->variableM"));

    
    }
        }
?>
