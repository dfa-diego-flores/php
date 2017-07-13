<?php

namespace Token;

use \Firebase\JWT\JWT;
use \Firebase\JWT\BeforeValidException;
use \Firebase\JWT\ExpiredException;
use \Firebase\JWT\SignatureInvalidException;

class AuthJWT
{
    private static $secret_key = 'dieguito.mateo.silvania';//= 'Sdw1s9x8@';
    private static $encrypt = ['HS256'];
    private static $aud = null;
    
    public static function SignIn($data)
    {
        $time = time();
        
        $token = array(
            'exp' => $time + (60*60),
            'aud' => self::Aud(),
            'data' => $data
        );

        return JWT::encode($token, self::$secret_key);
	}
   
   
	public static function generarToken(){	   
		//********CODIGO PARA GENERAR TOKEN***********
		$time = time();
		$token = array(
			'iat' => $time, // Tiempo que inició el token
			'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
			'data' => [ // información del usuario
				'id' => 1,
				'name' => 'Eduardo'
			]
		);

		$jwt = JWT::encode($token, self::$secret_key);
		return $jwt;
	}
   
    public static function verificarToken($jwt){	 
		$validado=false;
		try {
			$data = JWT::decode($jwt,self::$secret_key, array('HS256'));
			$validado=true;
		}catch (SignatureInvalidException $e) {
			$validado=false;
			//print "Error!: " . $e->getMessage();
			//die();
		}catch (ExpiredException $e) {
			$validado=false;
			//print "Error!: " . $e->getMessage();
			//die();
		}catch (BeforeValidException $e) {
			$validado=false;
			//print "Error!: " . $e->getMessage();
			//die();
		}
		return $validado;
	}
   
}