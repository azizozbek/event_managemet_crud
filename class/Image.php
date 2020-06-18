<?php
namespace eventify;

class Image
{

	private $ds;

	function __construct()
	{
		require_once("dbConn.php");
		$this->ds = new \DB(DBHost, DBPort, DBName, DBUser, DBPassword);

	}

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function reArrayFiles(&$file_post) {
		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}
		return $file_ary;
	}

	public function uploadImage($files) {
		$directory = "uploads/";
		$image_type = pathinfo($files['name'], PATHINFO_EXTENSION);
		$image_name = $this->generateRandomString().".".$image_type;
		$image_path = $_SERVER["DOCUMENT_ROOT"] ."/". $directory ."/". $image_name;
		$image_size = $files['size'];
		$check = getimagesize($files['tmp_name']);
		if($check){
			if($image_size>5000000){
				return false;
			} else {
				if($image_type != 'jpg' && $image_type != 'png'){
					return false;
				} else {
					move_uploaded_file($files['tmp_name'],$image_path);
					$query ="INSERT INTO images (path) VALUES (?)";
					$filter[] = $image_name;
					$this->ds->query($query, $filter);
					return true;
				}
			}
		} else {
			return false;
		}
	}

	public function selectAllimages(){
		$query="SELECT * FROM images";
		$imageResult = $this->ds->query($query);

		return $imageResult;
	}


}