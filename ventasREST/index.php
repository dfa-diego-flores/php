<?php

//incluir el archivo principal
include("Slim/Slim.php");

//incluir la autenticacion 
use \Token\AuthJWT;
//registran la instancia de slim
\Slim\Slim::registerAutoloader();

//aplicacion 
$app = new \Slim\Slim();


//***********INCLUIR TODAS LAS PETICIONES REST CREADAS ***************
include("app/Api/UsuarioREST.php");
include("app/Api/ProductoREST.php");
//***********FIN DE TODAS LAS PETICIONES REST CREADAS ***************


//inicializamos la aplicacion(API)
$app->run();

