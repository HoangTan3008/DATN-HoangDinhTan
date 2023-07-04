<?php
session_start();
include('../db/connect.php');
?>
<?php
    //session_destroy();
    //unset('dangnhap');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        if($taikhoan =='' || $matkhau ==''){
            echo '<p>Xin nhập đủ thông tin</p>';
        }else{
            $sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
            $count = mysqli_num_rows($sql_select_admin);
            $row_dangnhap = mysqli_fetch_array($sql_select_admin);
            if($count>0){
                $_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
                $_SESSION['admin_id'] = $row_dangnhap['admin_id'];
                header('Location: dashboard.php');
            }else{
                echo '<p>Tài khoản hoặc mật khẩu sai</p>';
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div>
        <h2 style="text-align: center;">Đăng nhập Admin</h2>
        <div style="margin-left: 690px;" class="from-group">
            <form action="" method="POST">
            <label>Tài khoản</label>
            <input type="text" name="taikhoan" placeholder="Nhập Email Của Bạn" class="form-control col-md-4">
            <label>Mật khẩu</label>
            <input type="password" name="matkhau" placeholder="Nhập Mật Khẩu Của Bạn" class="form-control col-md-4"><br>
            <input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập Admin">
            </form>
        </div>
    </div>
</body>
</html>