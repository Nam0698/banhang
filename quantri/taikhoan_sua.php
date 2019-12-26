<?php
$row=null;
$idUser = $_GET['idUser']; settype($idUser,"int");
$kq = $qt->TaiKhoan_ChiTiet($idUser);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['HoTen'])){
    $HoTen = $_POST['HoTen'];
    $Username = $_POST['Username'];
    $Dienthoai = $_POST['Dienthoai'];
    $idGroup = $_POST['idGroup'];
    $qt->TaiKhoan_Sua($idUser ,$HoTen, $Username, $Dienthoai, $idGroup);
    echo "<script>document.location='index.php?p=taikhoan_ds';</script>";
    exit();
}
?>

<style>
    .form-group .form-line {border-bottom:none}
    .form-group .form-control {padding:3px; border:1px solid #999}
    .form-group .form-line.abc {padding-top:5px;}
</style>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
        <div class="card">
            <div class="header">
                <h2>
                    SỬA LOẠI TÀI KHOẢN
                </h2>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="TenTL"> Họ Tên </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="HoTen" name="HoTen" class="form-control" placeholder="Nhập họ tên"  maxlength= "50" minlength="3" required value="<?=$row['HoTen']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Username</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="Username" name="Username" class="form-control" placeholder= "Nhập Username" required min="1" max="50" value="<?=$row['Username']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Điện thoại</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="Dienthoai" name="Dienthoai" class="form-control" placeholder= "Nhập số điện thoại" required min="1" max="50" value="<?=$row['Dienthoai']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">ID Group</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="idGroup" name="idGroup" class="form-control" placeholder= "Nhập ID Group (id = 1: là admin)" required min="1" max="50" value="<?=$row['idGroup']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SỬA TÀI KHOẢN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>