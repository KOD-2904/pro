<?php 
    include ('../lib/session.php');
    // include '../classes/product.php';
     Session::checkSession();
 ?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <title>Admin</title>
</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <div class="floatright">
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li>WELCOME</li>
                        <div class="nav-links">
                            <li><a href="index.php"><span>Trang chủ</span></a></li>
                            <li><a href="changepassword.php"><span>Thay đổi mật khẩu</span></a></li>
                            <li><a href="productadd.php"><span>ADD PRODUCT</span></a></li>
                            <li><a href="productlist.php"><span>PRODUCT LIST</span></a></li>
                        </div>
                        <?php 
                            if(isset($_GET['action']) && $_GET['action']=='logout'){
                                Session::destroy();
                            }
                         ?>
                        <li><a href="?action=logout">Đăng xuất</a></li>
                        <!-- Thêm một div chứa "Trang chủ" và "Thay đổi mật khẩu" -->
                        
                        <!-- Kết thúc phần thêm div -->
                    </ul>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
</div>

    