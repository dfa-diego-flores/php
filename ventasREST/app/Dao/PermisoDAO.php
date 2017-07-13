<?php 
namespace app\Dao;

use app\Dao\InterfaceDao\IPermiso;
use app\Model\Permiso;
use app\Db\DataSource;

class PermisoDAO implements IPermiso
{
  
    public function __construct(){
       
    }
        
   

    public function getPermisoByIdUser($id){
        
        $data_source = new DataSource();
        $data_table = $data_source->execConsultaObject
          ("select distinct co.id_componente,co.nombre as nombre_componente,vi.id_view , vi.nombre as nombre_view, u.ulogin  from permiso permi 
            inner join componente co on co.id_componente=permi.id_componente   
            inner join view vi on vi.id_view=co.id_view  
            inner join rol rol on rol.id_rol=permi.id_rol   
            inner join perfil perfi on perfi.id_rol=rol.id_rol  
            inner join usuario u on u.id_usuario=perfi.id_usuario  
            where u.id_usuario = :id and perfi.dbaja is null 
            order by vi.nombre",array(':id'=>$id),"Permiso");

        $permisos = array();
        foreach ($data_table as $key => $valor) {
                $permiso= new Permiso();
                $permiso=$data_table[$key];
                array_push($permisos, $permiso);
        }
        
        return $permisos;
    }

    public function delete($id) {
        
    }

    public function insert(Permiso $usuario) {
        
    }

    public function select() {
        
    }

    public function selectById($id) {
        
    }

    public function update(Permiso $usuario) {
        
    }

}

