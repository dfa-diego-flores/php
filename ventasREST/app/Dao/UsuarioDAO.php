<?php 
namespace app\Dao;

use app\Dao\InterfaceDao\IUsuario;
use app\Model\Usuario;
use app\Db\DataSource;

class UsuarioDAO implements IUsuario
{
    private $usuario;
            
    public function __construct(){
        $this->usuario= new Usuario();
    }
        
    public function validarUsuario($login, $clave){
            $data_source = new DataSource();
            $data_table = $data_source->execConsultaObject
           ("select u.id_usuario,u.ulogin as usuario, u.id_persona, u.estado,concat(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) as nombres ,p.mdocumento_identidad as dni  from usuario u
            inner join persona p on u.id_persona=p.id_persona
            where u.ulogin=:login and u.clave=md5(:clave)",
                                    array(':login'=>$login,':clave'=>$clave),"Usuario");

            if(count($data_table) == 1){
                    foreach ($data_table as $key =>$valor) {
                            $this->usuario = new Usuario();
                            $this->usuario=$data_table[$key];
                    }
        
            }else{
                   $this->usuario=null;
            }
            
            return $this->usuario;
    }

    public function delete($id) {
        
    }

    public function insert(Usuario $usuario) {
        
    }

    
    public function selectAll() {
        
    }

    public function selectById($id) {
        
    }

    public function update(Usuario $usuario) {
        
    }

}

