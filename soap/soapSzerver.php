<?php
class Szolgaltatas
{

    public function today()
    {
        return date("Y-m-d");
    }
}
$options = array(
    "uri" => "http://localhost/edo/soap/soapSzerver.php"
);
$server = new SoapServer(null, $options);
$server->setClass('Szolgaltatas');
$server->handle();
