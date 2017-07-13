<?php 

//include("../Dao/UsuarioDAO.php");
//include("../Usuario.php");

namespace app\Service;
use app\Model\Permiso;
use app\Dao\PermisoDAO;


class PermisoService
{
    
	public static function getPermisoByIdUser($id){
            $dao = new PermisoDAO();
            return $dao->getPermisoByIdUser($id);
	}
	
}
