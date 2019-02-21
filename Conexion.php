<?php
require __DIR__.'/twilio-php-master/Twilio/autoload.php';
require __DIR__.'/twilio-php-master/vendor/autoload.php';
use Twilio\Rest\Client;


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
    $sid    = "ACd962212640de91c9eee3c217c2d5e067";
    $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);
    $services = $twilio->chat->v2->services->read();
    foreach ($services as $record) {
        print($record->friendlyName);
    }


}

//Vista de los canales creados
function Ver_Canal(){
    $sid    = "ACd962212640de91c9eee3c217c2d5e067";
    $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);
    $channels = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels->read();
    foreach ($channels as $record) {
        print($record->friendlyName);
    }
}

//Crear un canal
function Crear_Canal(){
    $sid    = "ACd962212640de91c9eee3c217c2d5e067";
    $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);
    $channel = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels->create(array("friendlyName" => $Nombre));
    print($channel->friendlyName);
    header("Location:admin.php");
}

//Modificar un Canal
function Modificar_Canal(){
    $sid    = "ACd962212640de91c9eee3c217c2d5e067";
    $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);
    $channel = $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update(array("friendly_name" => "Canal X"));
    print($channel->friendlyName);
}

//Eliminar un Canal
function Eliminar_Canal(){
    $sid    = "ACd962212640de91c9eee3c217c2d5e067";
    $token  = "62cd3b521c0e8bd844e92c57a486fcb8";
    $twilio = new Client($sid, $token);
    $twilio->chat->v2->services("ISa12f8cc378d2435fbf56bbefb7210342")->channels("CHe690aaebfd8a400ea9d902464c25c298")->delete();
}