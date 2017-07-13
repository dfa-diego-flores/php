<?php
use \Token\AuthJWT;
use app\Service\UsuarioService; 
use app\Service\PermisoService; 
use app\Service\VistaPermisoService; 
   
//use \app\Model\Usuario;

/*
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}Util{$ds}Rutas.php");
*/

require_once( realpath(dirname(__FILE__)  .'/..').'/Util/Rutas.php');
//include_once '../Util/Rutas.php';

$app->get(
    '/',function() use ($app){
 
		$service= new UsuarioService();
		$usuario=$service-> crearUsuario();
		//var_dump($usuario);
    	//consultas a la base de datos 
    	// peticiones a otro rest 
    	// etcetera
		
		$usuarios=$service->selectUsuarios();
    	$datos = array(
    					"nombre" => "pepe", 
    					"edad" => "23",
						"token" => AuthJWT::generarToken(),
						"usuario"=>$usuario
    					);

    	//json 
        echo "".json_encode($datos);
    }
)->setParams(array($app));

$app->get(
    '/usuario/:nombre',function($nombre) use ($app){
    	$id = $nombre;
    	//almaceno el ID
    	//conexion con base de datos
    	//el proceso
    	// retorno un JSON
        echo "hola bienvenido " . $nombre;
    }
);

/*
$app->get(API_USUARIO_REST.'/login/:login/:clave',function($login,$clave) use ($app){
      
        $user=UsuarioService::validarUsuario($login, $clave);
        if($user!=null){
            $permisos= PermisoService::getPermisoByIdUser($user->id_usuario);
            $vistasPermisos= VistaPermisoService::getVistaByIdUser($user->id_usuario); 
        }
        
       
        $datos=array();
        $datos["usuario"]=$user;
        $datos["permisos"]=$permisos;
        $datos["vistasPermisos"]=$vistasPermisos;
        

        echo json_encode($datos);
    }
);*/

$app->post(API_USUARIO_REST.'/login/',function() use ($app){
      
        $json=$app->request->getbody();
        $data = json_decode($json);
        //var_dump($data);
        
        $user=UsuarioService::validarUsuario($data->Usuario, $data->Clave);
        if($user!=null){
            $permisos= PermisoService::getPermisoByIdUser($user->id_usuario);
            $vistasPermisos= VistaPermisoService::getVistaByIdUser($user->id_usuario); 
        }
        
        $datos=array();
        $datos["usuario"]=$user;
        $datos["permisos"]=$permisos;
        $datos["vistasPermisos"]=$vistasPermisos;
        $datos["rpta"]=true;
       
        echo json_encode($datos);
        
    }
);

