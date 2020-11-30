<?php

$options = array(
    "location" => "http://localhost/edo/soap/soapSzerver.php",
    "uri" => "http://localhost/edo/soap/soapSzerver.php",
    'keep_alive' => false,
);
try {
    $kliens = new SoapClient(null, $options);
    echo $kliens->today() . "<br>";
} catch (SoapFault $e) {
    var_dump($e);
}
