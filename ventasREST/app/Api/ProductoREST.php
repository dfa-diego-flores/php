<?php
use \Token\AuthJWT;

$app->get(
    '/producto',function() use ($app){
 

    	$datos = array(
    					"nombre" => "pepe", 
    					"edad" => "23",
						"token" => AuthJWT::generarToken(),
    					);

        echo json_encode($datos);
    }
)->setParams(array($app));


$app->get(
    '/producto/:nombre',function($nombre) use ($app){
    	$id = $nombre;
    	//almaceno el ID
    	//conexion con base de datos
    	//el proceso
    	// retorno un JSON
        echo "hola bienvenido " . $nombre;
    }
);


