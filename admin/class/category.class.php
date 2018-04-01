<?php
require_once "common.php";
class Category extends Common {
	public $id, $name, $rank, $status, $created_by, $modified_by, $created_date, $modfied_date;

	public function save()
	{
		$sql = "insert into tbl_category (name,rank,status,created_by,created_date) values('$this->name', '$this->rank', '$this->status', '$this->created_by', '$this->created_date') ";
		$result = $this->insert($sql);
		if($result){
			$_SESSION['success_message'] = "Category Inserted successfully with $result";
			//header('location:list_category.php');
			redirect('list_category.php');
		}else{
			return false;
		}
	}
	public function index() //listing
	{
		$sql = "SELECT * FROM tbl_category";
		$list = $this->select($sql);
		return $list;
	}
	public function edit()
	{
		$sql = "UPDATE tbl_category SET name='$this->name',rank='$this->rank',status='$this->status',modified_by='$this->modified_by',modified_date='$this->modified_date' WHERE id='$this->id'";
		//print_r($sql);
		$result = $this->update($sql);
		if($result){
			$_SESSION['success_message'] = "Category Updated successfully";
			//header('location:list_category.php');
			redirect('list_category.php');
		}else{
			return false;
		}
		
	}
	public function remove()
	{
		$sql = "DELETE FROM tbl_category where id='$this->id'";
		$this->delete($sql);
	}

	public function selectCategoryByID(){
		$sql = "SELECT * FROM tbl_category WHERE id='$this->id' ";
		$list = $this->select($sql);
		return $list;
	}

	public function selectAllActiveCategory(){
		$sql = "SELECT * FROM tbl_category WHERE status=1 ORDER BY name";
		$list = $this->select($sql);
		return $list;
	}
	
}


?>