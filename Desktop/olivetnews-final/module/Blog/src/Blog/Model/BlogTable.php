<?php 
namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;

class BlogTable{
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchAll(){
		//$resultSet = $this->tableGateway->select();
		$select = $this->tableGateway->getSql()->select();
		
		$select->order('id desc');
		
		return $this->tableGateway->selectWith($select);
	}
	public function getBlog($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
	public function saveBlog(Blog $blog){
		$data = array(
				'name' => $blog->getName(),
				'position'  => $blog->getPosition(),
	
		);
		
		$id = (int)$blog->getId();
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getBlog($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}
	
	public function deleteBlog($id){
		$this->tableGateway->delete(array('id' => $id));
	}
}
