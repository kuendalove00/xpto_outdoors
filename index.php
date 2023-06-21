<?php

require "./vendor/autoload.php";
require "./routes/router.php";

try{
    $url = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER["REQUEST_METHOD"];

    if(!isset($router[$request]))
    {
        throw new Exception("A rota não existe");
    }
}catch(Exception $e)
{
    $e->getMessage();
}