<?php
    include('../db/connect.php');
?>
<?php
   if(isset($_POST['themsanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $soluong = $_POST['soluong'];
        $gia = $_POST['giasanpham'];
        $giakhuyenmai = $_POST['giakhuyenmai'];
        $danhmuc = $_POST['danhmuc'];
        $chitiet = $_POST['chitiet'];
        $mota = $_POST['mota'];
        $sql_insert = mysqli_query($con,"INSERT INTO tbl_category(category_name) values ('$tendanhmuc')");
   }
//    elseif(isset($_POST['capnhatdanhmuc'])){
//         $id_post = $_POST['id_danhmuc'];
//         $tendanhmuc = $_POST['danhmuc'];
//         $sql_update = mysqli_query($con,"UPDATE tbl_category SET category_name='$tendanhmuc' WHERE category_id='$id_post'");
//         header('Location:xulydanhmuc.php');
//    }
//    if(isset($_GET['xoa'])){
//         $id = $_GET['xoa'];
//         $sql_xoa = mysqli_query($con,"DELETE FROM tbl_category WHERE category_id='$id'");
//    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Khách hàng</a>
            </li>
            </ul>
        </div>
     </nav><br><br>
    <div class="container">
        <div class="row">
           <!--  <?php
            if(isset($_GET['quanly'])=='capnhat'){
                $id_capnhat = $_GET['id'];
                $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_category WHERE category_id='$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
                ?>
                <div class="col-md-4">
                <h4>Cập nhật danh mục</h4>
                <label for="">Tên danh mục</label>
                <form action="" method="POST">
                    <input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['category_name'] ?>"><br>
                    <input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['category_id'] ?>">
                    <input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-default">
                </form>
                </div>
            <?php
            }else{
                ?> -->
                <div class="col-md-4">
                <h4>Thêm sản phẩm</h4>
                
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh"><br>
                    <label>Giá</label>
                    <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
                    <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>
                    <label>Số lượng</label>
                    <input type="text" class="form-control" name="soluong" placeholder="Số lượng"><br>
                    <label>Mô tả</label>
                    <textarea name="mota" class="form-control"></textarea><br>
                    <label>Chi tiết</label>
                    <textarea name="chitiet" class="form-control"></textarea><br>
                    <label>Danh mục</label>
                    <?php
                    $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC")
                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">------Chọn danh mục------</option>
                        <?php
                        while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){                                                 
                        ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
                </form>
                </div>
                <?php
            }
               
            ?>
            <div class="col-md-8">
                <h4>Liệt kê sản phẩm</h4>
                <!-- <?php
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC");
                ?> -->
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <th>Quản lý</th>
                    </tr>
                    <!-- <?php
                    $i = 0;
                    while($row_category = mysqli_fetch_array($sql_select)){
                        $i++;
                  
                    ?> -->
                    <tr>
                        <td>1</td>
                        <td>adhsiuasdhiuahdsi</td>
                        <td>adhsiuasdhiuahdsi</td>
                        <td>adhsiuasdhiuahdsi</td>
                        <td>adhsiuasdhiuahdsi</td>
                        <td>adhsiuasdhiuahdsi</td>
                        <td>adhsiuasdhiuahdsi</td>
                        <td><a href="?xoa=">Xóa</a> || <a href="">Cập nhật</a></td>
                    </tr>
                  <!--   <?php
                    }
                    ?> -->
                </table>
            </div>
        </div>
    </div>
</body>
</html>