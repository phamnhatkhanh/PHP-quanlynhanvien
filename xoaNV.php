<?php
    session_start();
    require_once('libs/connectDB.php');
    if (!isset($_SESSION['admin'])){		
		echo "<script>location.href='login.php';</script>";		
	}
    if(isset($_GET['idNV'])){
        $msnv = $_GET['idNV'];
        $sql = "DELETE FROM t_nhanvien WHERE MaNV='$msnv'";
        $kq=mysqli_query($db,$sql);
        if($kq){
            $n=mysqli_affected_rows($db);
            echo "<script>alert('Đã xoá $n nhân viên thành công');
                    location.href='index.php';</script>";
        }else{
            $loi=mysqli_error($db);
            echo "<script>alert('Xoá nhân viên thất bại - error:$loi');
                          location.href='index.php';</script>";
        }
    }
?>