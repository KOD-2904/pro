<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?  
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data, $files)
    {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$productcategory = mysqli_real_escape_string($this->db->link, $data['productCategory']);
			$productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
			$productSize = mysqli_real_escape_string($this->db->link, $data['size']);
			$productAmount = mysqli_real_escape_string($this->db->link, $data['amount']);

            $permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


            if($productName =='' || $productcategory == '' || $productPrice == '' || $productSize == ''|| $productAmount == ''  || $file_name == '')
            {
				$alert = "<span class='error'>CAN EMPTY</span>";
				return $alert;
			}
            else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO product (id, name,category,img,price,size,amount) VALUES(0, '$productName','$productcategory','$unique_image', $productPrice,$productSize,$productAmount) ";
                $result = $this->db->insert($query);
                if($result){
					$alert = "<span class='success'>ADD SUCCESSFULLY</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>ADD NOT SUCCESSFULLY</span>";
					return $alert;
				}
            }
    }
	public function show_product()
		{
			$query = "SELECT * FROM product";

			// $query = "SELECT * FROM tbl_product order by productId desc ";
			$result = $this->db->select($query);
			return $result;
		}
	public function getproductbyId($id)
	{
		$id = mysqli_real_escape_string($this->db->link,$id);
		$query = "SELECT * FROM product where id = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function update_product($data, $files, $id)
	{
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$productcategory = mysqli_real_escape_string($this->db->link, $data['productCategory']);
			$productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
			$productSize = mysqli_real_escape_string($this->db->link, $data['size']);
			$productAmount = mysqli_real_escape_string($this->db->link, $data['amount']);

            $permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($productName =='' || $productcategory == '' 
			|| $productPrice == '' || $productSize == ''
			|| $productAmount == '' )
            {
				$alert = "<span class='error'>CAN EMPTY</span>";
				return $alert;
			}
            else{
				if(empty($file_name)){
					$query = "UPDATE product SET 
					name = '$productName',
					category = '$productcategory',
					price = '$productPrice',
					size= '$productSize',
					amount = '$productAmount' WHERE id = '$id' ";
					$result  = $this->db->update($query);
				}
				if($result){
					$alert = "<span class='success'>UPDATE SUCCESSFULLY</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>UPDATE NOT SUCCESSFULLY</span>";
					return $alert;
				}
			}
	}
	public function delete_product($id)
	{
		$id = mysqli_real_escape_string($this->db->link,$id);
		$query = "DELETE FROM product where id = '$id' ";
		$result = $this->db->select($query);
		if($result){
			$alert = "<span class='success'>DELETE SUCCESSFULLY</span>";
			return $alert;
		}else {
			$alert = "<span class='error'>DELETE NOT SUCCESSFULLY</span>";
			return $alert;
		}
	}
}