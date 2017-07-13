<?php 
namespace app\Dao\InterfaceDao;
use app\Model\Persona;

interface IPersona
{

	public function selectAll();
	public function selectById($id);
	public function insert(Persona $bean);
	public function update(Persona $bean);
	public function delete($id);

}

?>