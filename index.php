<?php
    session_start();
    require_once('libs/connectDB.php');
    if (!isset($_SESSION['admin'])){		
		echo "<script>location.href='login.php';</script>";		
	}
    $sql="SELECT t_nhanvien.*,TenPhong FROM t_nhanvien,t_phong WHERE t_nhanvien.MaPhong=t_phong.MaPhong ORDER BY t_nhanvien.MaNV";
    $kq=mysqli_query($db,$sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Home</title>        
        <link
            rel="stylesheet"
            href="css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="css/main.css" />
    </head>

    <body>        
            <?php
                include('include/menuTop.php');                
                //include('include/content.php');
            ?>
        <!-- than -->
            
        <div class="content-left col-md-12">   <!--start: class="content-left"-->
                    <div class="content-header">
                        <p class="text-content-header">DANH SÁCH NHÂN VIÊN</p>
                    </div>
                    
                    <div class="content-body">    <!--start: class="content-body"-->         
                        <div class="container-list-product col-sm-12 col-md-12">             
                            <div class="row">   <!--start: class="row"-->
        						<table width="100%" style="margin-left:10px;">
		        					<tr>                                        
                                        <th>Mã số NV</th>
                                        <th>Họ lót</th>
                                        <th>Tên</th>
                                        <th>Giới tính</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Tên phòng</th>
                                        <th>Chức năng</th>
                                    </tr>
                                    <?php
                                        if (mysqli_num_rows($kq)>0){ //ham dem so dong
									        while($row=mysqli_fetch_assoc($kq)){ //ham lay ra tung dong du lieu 
										    $msnv=$row['MaNV'];
                                            $holot=$row['HoLotNV'];
										    $ten=$row['TenNV'];
										    $gt=$row['GioiTinh']==0?'Nữ':'Nam';
                                            $dt=$row['DienThoai'];
                                            $dc=$row['DiaChi'];
										    $tenp=$row['TenPhong'];
										    echo '<tr>';
											    echo'<td>'. $msnv.'</td>';
											    echo'<td>'. $holot.'</td>';
											    echo'<td>'. $ten.'</td>';
											    echo'<td>'. $gt.'</td>';
                                                echo'<td>'. $dt.'</td>';
                                                echo'<td>'. $dc.'</td>';
                                                echo'<td>'. $tenp.'</td>';
											    echo"<td><a href='xoaNV.php?idNV=$msnv'> Xoá </a>";							
										    echo'</tr>';										
									        }
								        }
                                    ?>																
						        </table>
                            </div>
                            <form action="#" method="post" style="margin: 50px 50px;">
                                <h5>NHẬP NHÂN VIÊN MỚI</h5>
                                <div class="row">                       
                                    <div class="detail-product col-md-12">                        
                                        <div class="description">                                
                                            <div class="text-member-subscribe">
                                                <span class="member-label">Họ lót NV</span>
                                                <input class="member-input" type="text" name="holot" value=""/>                                    
                                            </div>
                                            <div class="text-member-subscribe">
                                                <span class="member-label">Tên</span>
                                                <input class="member-input" type="text" name="ten" value=""/>                                    
                                            </div>
                                            <div class="text-member-subscribe">
                                                <span class="member-label">Giới tính</span>
                                                <input class="member-input" type="text" name="gt" value=""/>                                    
                                            </div>
                                            <div class="text-member-subscribe">
                                                <span class="member-label">Điện thoại</span>
                                                <input class="member-input" type="text" name="dienthoai" value=""/>                                    
                                            </div>                                                                                        
                                            <div class="text-member-subscribe">
                                                <span class="member-label">Địa chỉ</span>
                                                <input class="member-input" type="text" name="diachi" value=""/>                                    
                                            </div>
                                            <div class="text-member-subscribe">
                                                <span class="member-label">Tên phòng:</span>
                                                <select name="dmMP" required="">
                                                    <?php
                                                        $sql="SELECT * from t_phong";
                                                        $kq= mysqli_query($db,$sql);
                                                        if(mysqli_num_rows($kq)>0){
                                                            while($row=mysqli_fetch_assoc($kq)){
                                                                echo "<option value=".$row['MaPhong'].">".$row['TenPhong']."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>                                            
                                        </div>                        
                                    </div>  
                                </div>                    
                                <div class="row-submit">
                                    <p class="text-product"><input type="submit" name="add" value="Thêm nhân viên"/></p>
                                </div>
                            </form>                            
                            <?php
                                if(isset($_POST['add'])){
                                    if(!empty($_POST['holot']) && !empty($_POST['ten']) && !empty($_POST['dienthoai'])){
                                            $ho=$_POST['holot'];                    
                                            $ten=$_POST['ten'];              
                                            $gt=$_POST['gt']=='Nữ'?'0':'1';
                                            $dthoai=$_POST['dienthoai'];
                                            $dchi=$_POST['diachi'];   
                                            $map=$_POST['dmMP'];
                                            $sql="INSERT INTO t_nhanvien(HoLotNV,TenNV,GioiTinh,DienThoai,DiaChi,MaPhong) VALUES('$ho','$ten','$gt','$dthoai','$dchi','$map')";
                                            $kq=mysqli_query($db,$sql);
                                            if($kq){
                                                $n=mysqli_affected_rows($db);
                                                echo "<script>alert('Đã thêm $n nhân viên thành công');
                                                        location.href='index.php';</script>";
                                            }else{
                                                $loi=mysqli_error($db);
                                                echo "<script>alert('Thêm nhân viên thất bại - error:$loi');
                                                              location.href='index.php';</script>";
                                            }
                                    }
                                            
                                }
                            ?>
                        </div>
                    </div>    <!--end: class="content-body"-->


                </div>     <!--end: class="content-left"-->                                
            </div> <!--END: class="content row"-->
            <!----------------CONTENT (left+right)------------------>

    </div> <!--END: CLASS="WRAPPER"-->
        <!-- ket thuc than-->


	
		
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->   
        
    </body>
</html>