<?php 
namespace app\Dao;

use app\Dao\InterfaceDao\IVistaPermiso;
use app\Model\VistaPermiso;
use app\Db\DataSource;

class VistaPermisoDAO implements IVistaPermiso
{
    
    
    public function getVistaByIdUser($id){
        $data_source = new DataSource();
        $data_table = $data_source->execConsultaObject
        ('select distinct vi.nombre as nombre_view from permiso permi
        inner join componente co on co.id_componente=permi.id_componente
        inner join view vi on vi.id_view=co.id_view
        inner join rol rol on rol.id_rol=permi.id_rol
        inner join perfil perfi on perfi.id_rol=rol.id_rol
        inner join usuario u on u.id_usuario=perfi.id_usuario
        where u.id_usuario = :id and perfi.dbaja is null 
        order by vi.nombre',array(':id'=>$id),"VistaPermiso");

        $vistasPermiso=array();
        foreach ($data_table as $key =>$valor) {
                $bean = new VistaPermiso();
                $bean=$data_table[$key];
                array_push($vistasPermiso, $bean);
        }
        return $vistasPermiso;
     
    }
    
    public function delete($id) {
        
    }

    public function insert(VistaPermiso $bean) {
        
    }

    public function selectAll() {
        
    }

    public function selectById($id) {
        
    }

    public function update(VistaPermiso $bean) {
        
    }

}

