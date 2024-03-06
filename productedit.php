<?php include 'inc/header.php';?>

<?php include '../classes/category.php';  ?>
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product(); 
    if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL){
        echo "<script> window.location = 'productlist.php' </script>";
        
    }else {
        $id = $_GET['product_id']; // Lấy productid trên host
        $getproductbyId = $pd->getproductbyId($id);
        

    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updateProduct = $pd -> update_product($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
?>
<div class="grid_8">
    <div class="box round first grid">
        <div class="block">
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <<?
                if(isset($updateProduct))
                {
                    echo $updateProduct;
                }
                else{
                    echo "KHÔNG THANHF CÔNG";
                }
                ?>
               <?
                
                if($getproductbyId)
                {
                    while($result = $getproductbyId->fetch_assoc())
                    {
                
               ?>
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Product Name" value="<? echo $result['name']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <input name="productCategory" type="text" placeholder="Category" value="<? echo $result['category']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="productPrice" type="text" placeholder="Size" value="<? echo $result['price']?>" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Size</label>
                    </td>
                    <td>
                        <input name="size" type="number" placeholder="Size" value="<? echo $result['size']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Amount</label>
                    </td>
                    <td>
                        <input name="amount" type="number" placeholder="Amount" value="<? echo $result['amount']?>"  />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <input name="image" type="file"  />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="UPDATE" />
                    </td>
                </tr>
                <?
                }
            }
                ?>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


