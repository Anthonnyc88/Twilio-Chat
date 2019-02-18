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
        $this->canales= $canales;      
    }
   

    function Crear_Servicio(){
    $sid    = "ACd962212640de91c9eee3c217c2d5e067";
    $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);

    $service = $twilio->chat->v2->services
                        ->create("Servicio_Twilio");

    print($service->sid);
    }

    //Vista de los servicios creados
    function Ver_Servicio(){
    $sid = "ACd962212640de91c9eee3c217c2d5e067";
    $token  = "62cd3b521c0e8bd844e92c57a486fcb8";   
    $twilio = new Client($sid, $token);

    $services = $twilio->chat->v2->services
                        ->read();

    foreach ($services as $record) {
    print($record->friendlyName);
    }
}

    
    function Ver_Canal(){
    $sid = "ACd962212640de91c9eee3c217c2d5e067";
    $token = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);

    $channels = $twilio->chat->v2->services("IS489edb5d4deb40a0981b9eb424ef970b")
    ->channels
    ->read();


    
    echo $output;
    $output = '';
    foreach ($channels as $record) {
    $output .= "
    <table style='width:100%'>
    <tr>
    <th><td>$record->friendlyName</td></th>
    
    <form action='Modificar_Canal.php' method='post'>
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
    <form action='Eliminar_Canal.php' method='post'>
    <th><td><input type='hidden' id='eliminar' name='eliminar' value='$record->sid'></input></td></th>
    <th><td><button type='submit' class='btn btn-danger'>Eliminar</button></td></th>            
    </form>           
    </tr>
    </table>
    ";   
    }
    /*<table style='width:50%'>
    <form action='Eliminar_Canal.php' method='post'>
    <tr>
    <td>$record->friendlyName</td>
    <td><input type='hidden' id='eliminar' name='eliminar' value='$record->sid'></input></td>
    <td><button type='submit' class='btn btn-danger'>Eliminar</button></td>
    </form>
    </tr>
    <form action=Modificar_Canal.php>
    <td><button class='btn btn-primary'>Modificar</button></td>                       
    </table>
    </form>
    </tr>*/
    echo $output;
    }
    function Eliminar_Canal(){
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        
        $twilio->chat->v2->services("IS489edb5d4deb40a0981b9eb424ef970b")
                         ->channels($this->variable)
                         ->delete();
    } 
    function Crear_Canal(){
        
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
    
        $channel = $twilio->chat->v2->services("IS489edb5d4deb40a0981b9eb424ef970b")
                                    ->channels
                                    ->create(array("friendlyName" => $this->variable));
        
    }
    
    function Modificar_Canal(){
        $sid    = "ACd962212640de91c9eee3c217c2d5e067";
        $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
        $twilio = new Client($sid, $token);
        $channel = $twilio->chat->v2->services("IS489edb5d4deb40a0981b9eb424ef970b")->channels("$this->variable")->update(array("friendlyName" => "$this->variableM"));

        //print($channel->friendlyName);
    }
    
   
        }
?>
