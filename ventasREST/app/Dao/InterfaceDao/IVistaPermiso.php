<?php 
namespace app\Dao\InterfaceDao;
use app\Model\VistaPermiso;

interface IVistaPermiso
{

	public function selectAll();
	public function selectById($id);
	public function insert(VistaPermiso $bean);
	public function update(VistaPermiso $bean);
	public function delete($id);

}

?>