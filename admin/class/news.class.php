<?php
require_once "common.php";
class News extends Common {
	public $id, $category_id, $title, $status, $short_description, $feature_image, $content, $slider_key, $breaking_key, $view_count, $created_by, $modified_by, $created_date, $modified_date;

	public function save()
	{
		$sql = "insert into tbl_news (category_id,title,status,short_description, feature_image, content, slider_key, breaking_key, view_count, created_by,created_date) values('$this->category_id', '$this->title', '$this->status','$this->short_description', '$this->feature_image', '$this->content', '$this->slider_key', '$this->breaking_key', '$this->view_count',  '$this->created_by', '$this->created_date') ";
		$result = $this->insert($sql);
		if($result){
			$_SESSION['success_message'] = "News Inserted successfully with $result";
			redirect('list_news.php');
		}else{
			return false;
		}
	}
	public function index() //listing
	{
		$sql = "SELECT n.* , c.name FROM tbl_news as n JOIN tbl_category as c on c.id=n.category_id";
		$list = $this->select($sql);
		return $list;
	}
	public function edit()
	{
		$sql = "UPDATE tbl_news SET name='$this->name',rank='$this->rank',status='$this->status',modified_by='$this->modified_by',modified_date='$this->modified_date' WHERE id='$this->id'";
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
		$sql = "DELETE FROM tbl_news where id='$this->id'";
		$this->delete($sql);
	}

	public function selectCategoryByID(){
		$sql = "SELECT * FROM tbl_news WHERE id='$this->id' ";
		$list = $this->select($sql);
		return $list;
	}

	public function getNewsSlider(){
		$sql = "SELECT * FROM tbl_news WHERE status=1 AND slider_key=1 ORDER BY created_date DESC ";
		$list = $this->select($sql);
		return $list;
	}

	public function getLatestNews(){
		$sql = "SELECT * FROM tbl_news WHERE status=1 ORDER BY created_date DESC LIMIT 3";
		$list = $this->select($sql);
		return $list;
	}

	public function getBreakingNews(){
		$sql = "SELECT * FROM tbl_news WHERE status='1' AND breaking_key='1' AND category_id='$this->category_id' ORDER BY created_date DESC LIMIT 1";
		// $sql = "SELECT n.* , c.name FROM tbl_news as n JOIN tbl_category as c on c.id=n.category_id HAVING n.status='1' AND n.breaking_key='1'";

		$list = $this->select($sql);
		return $list;
	}

	public function getAllCategoryNews(){
		$sql = "SELECT * FROM tbl_news WHERE status='1' AND category_id='$this->category_id' ORDER BY created_date DESC";
		$list = $this->select($sql);
		return $list;
	}

	public function selectNewsByID(){
		$sql = "SELECT * FROM tbl_news WHERE id='$this->id' ";
		$list = $this->select($sql);
		return $list;
	}
	
	public function updateNewsCount(){
		$sql = "UPDATE tbl_news set view_count='$this->view_count' WHERE id='$this->id' ";
		$this->update($sql);
	}
}


?>