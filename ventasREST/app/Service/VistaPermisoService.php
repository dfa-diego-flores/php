<?php 

//include("../Dao/UsuarioDAO.php");
//include("../Usuario.php");

namespace app\Service;
use app\Model\VistaPermiso;
use app\Dao\VistaPermisoDAO;


class VistaPermisoService
{
   
    public static  function getVistaByIdUser($id){
        $dao = new VistaPermisoDAO();
        return $dao->getVistaByIdUser($id);
    }
}
