<?php include 'inc/header.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new product();
	$fm = new Format();
 ?>
 <?
    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL){
        // echo "<script> window.location = 'productlist.php' </script>";
        
    }else {
        $id = $_GET['product_id']; // Lấy productid trên host
        $productdelete = $pd->delete_product($id);
        

    } 
 ?>
 <link rel="stylesheet" type="text/css" href="../css/productlist.css">
<div class="grid_8">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
    <table class="data display datatable" id="example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Size</th>
                <th>Amount</th>
                <th>Image</th>
                <th>OPTION</th>
            </tr>
        </thead>
        <tbody>
            <?
                if(isset($productdelete))
                {
                    echo $productdelete;
                }
            ?>
            <?php 
            $pdlist = $pd->show_product();
            if($pdlist->num_rows > 0){
                while ($result = $pdlist->fetch_assoc()){
            ?>
                <tr class="<?php echo $i % 2 == 0 ? 'even' : 'odd'; ?>">
                    <td><?php echo $result['id'] ?></td>
                    <td><?php echo $result['name'] ?></td>
                    <td><?php echo $result['category'] ?></td>
                    <td><?php echo $result['price'] ?></td>
                    <td><?php echo $result['size'] ?></td>
                    <td><?php echo $result['amount'] ?></td>
                    <td><img src="uploads/<?php echo $result['image'] ?>" width="150px"></td>
                    <td><a href="productedit.php?product_id=<?php echo $result['id'] ?>">Sửa</a> 
                    || <a href="?product_id=<?php echo $result['id'] ?>">Xóa</a></td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="7">No products found.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

    </div>
</div>

