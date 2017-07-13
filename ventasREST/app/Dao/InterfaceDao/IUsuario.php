<?php 
namespace app\Dao\InterfaceDao;
use app\Model\Usuario;

interface IUsuario
{

	public function selectAll();
	public function selectById($id);
	public function insert(Usuario $usuario);
	public function update(Usuario $usuario);
	public function delete($id);

}

?>