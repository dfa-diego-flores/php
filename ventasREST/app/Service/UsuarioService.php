<?php 

//include("../Dao/UsuarioDAO.php");
//include("../Usuario.php");

namespace app\Service;
use app\Model\Usuario;
use app\Dao\UsuarioDAO;


class UsuarioService
{
	public static function crearUsuario(){
		$usuario = new Usuario();
		$usuario->idusuario=1;
		/*$usuario->setNombre("Daniel");
		$usuario->setApellidoPaterno("Brena");
		$usuario->setApellidoMaterno("Aquino");
		$usuario->setNacionalidad("Mexicana");
		$usuario->setSexo("Hombre");
		$usuario->setCorreo("daniel_brena@outlook.com");
		$usuario->setClave("daniel12345");
		*/
		return $usuario;
	}
	
	public static function  validarUsuario($login, $clave){
                $dao = new UsuarioDAO();
                return $dao->validarUsuario($login,$clave);
	}
        
        public static function selectUsuarios(){
                $dao = new UsuarioDAO();	
                $dao->selectUsuarios();
	}
}
