<?php include 'inc/header.php';?>

<?php include '../classes/category.php';  ?>
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_product($_POST, $_FILES); // hàm check catName khi submit lên
    }
?>
<div class="grid_8">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <?php 
            if(isset($insertProduct)){
                echo $insertProduct;
            }
         ?>   
        <div class="block">
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Product Name" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <input name="productCategory" type="text" placeholder="Category" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="productPrice" type="text" placeholder="Size" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Size</label>
                    </td>
                    <td>
                        <input name="size" type="number" placeholder="Size" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Amount</label>
                    </td>
                    <td>
                        <input name="amount" type="number" placeholder="Amount" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="ADD" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>


