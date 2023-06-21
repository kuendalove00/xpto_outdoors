<?php

function carregar(string $controller, string $acao)
{
    //Verificar se o controller existe
    $controllerNamespace = "app\\controllers\\{$controller}";

    try{
        if(!class_exists($controllerNamespace))
        {
            throw new Exception("O controller {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();

        if(!method_exists($controllerInstance, $acao))
        {
            throw new Exception(
                "O método {$acao} não existe no controller {$controller}"
            );
        }

        $controllerInstance->$acao((object) $_REQUEST);
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
}

$routes = [
    'GET' => [
        '/' => fn() => carregar('HomeController', "index"),
        '/contact' => fn() => carregar('ContactController', "index"),
    ],
    'POST' => [
        'contact' => fn() => carregar('ContactController', "store"),
    ],
    ];