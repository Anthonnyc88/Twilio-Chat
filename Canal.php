<?php
require __DIR__.'/twilio-php-master/Twilio/autoload.php';
require __DIR__.'/twilio-php-master/vendor/autoload.php';
require __DIR__.'/twilio-php-master/Services/Twilio.php';
use Twilio\Rest\Client;

class Canal{
    public $canal;
    public $canales;
    
    function __construct($canal,$canales){
        $this->canal= $canal;    
        $this->canal= $canales;      
    }
  
    function Crear_Servicio(){
    $sid = "ACd962212640de91c9eee3c217c2d5e067";
    $token= "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);

    $service = $twilio->chat->v2->services
                        ->create("Servicio_Twilio");

    print($service->sid);
    }

    function Ver_Servicio(){
    $sid = "ACd962212640de91c9eee3c217c2d5e067";
    $token = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);

    $services = $twilio->chat->v2->services
                        ->read();

    foreach ($services as $record) {
    print($record->friendlyName);
    }
}

function Ver_Canal(){
    $sid= "ACd962212640de91c9eee3c217c2d5e067";
    $token= "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);
    $channels = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")
    ->channels
    ->read();
    $output = '';
    foreach ($channels as $record) {
    $output .= "
    <table style='width:35%'>
    <tr>
    <th><td>$record->friendlyName</td></th>
    
    <form action='Canal_Update.php' method='post'>
    <th><td><input type='hidden' id='id' name='id' value='$record->sid'></input></td></th>
    
    <td>
    <li><a href='' class='dropdown-toggle' data-toggle='dropdown'><button type='button'>Modificar</button></a>
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
    <th><td><button type='submit'>Eliminar</button></td></th>            
    </form>           
    </tr>
    </table>
    ";   
    }
    echo $output;
    }
    
    function Eliminar_Canal(){
        $twilio = new Client($sid, $token);
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")
                         ->channels($this->canal)
                         ->delete();
    } 
    
    function Crear_Canal(){ 
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $channel = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")
                                    ->channels
                                    ->create(array("friendlyName" => $this->canal));
    }
    
    function Modificar_Canal(){
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $channel = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels("$this->canal")->update(array("friendlyName" => "$this->canales"));

    
    }
        }
?>
