<?php 
namespace app\Dao\InterfaceDao;
use app\Model\Permiso;

interface IPermiso
{

	public function select();
	public function selectById($id);
	public function insert(Permiso $usuario);
	public function update(Permiso $usuario);
	public function delete($id);

}
