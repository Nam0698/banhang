<?php
$row=null;
$idDH = $_GET['idDH']; settype($idDH,"int");
$kq = $qt->DonHang_ChiTiet($idDH);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['TenNguoiNhan'])){
    $TenNguoiNhan = $_POST['TenNguoiNhan'];
    $DTNguoiNhan = $_POST['DTNguoiNhan'];
    $DiaChi = $_POST['DiaChi'];
    $DiaChi = $_POST['TongTien'];
    $Shipping = $_POST['Shipping'];
    $DaTraTien = $_POST['DaTraTien'];
    $qt->DonHang_Sua($idDH, $TenNguoiNhan, $DTNguoiNhan, $DiaChi, $TongTien, $Shipping, $DaTraTien);
    echo "<script>document.location='index.php?p=donhang_ds';</script>";
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
                    SỬA ĐƠN HÀNG
                </h2>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="TenTL"> Tên người nhận </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TenNguoiNhan" name="TenNguoiNhan" class="form-control" placeholder="Nhập tên người nhận"  maxlength= "50" minlength="3" required value="<?=$row['TenNguoiNhan']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Số điện thoại người nhận</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="DTNguoiNhan" name="DTNguoiNhan" class="form-control" placeholder= "Nhập điện thoại người nhận" required min="1" max="50" value="<?=$row['DTNguoiNhan']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Địa chỉ</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="DiaChi" name="DiaChi" class="form-control" placeholder= "Nhập địa chỉ người nhận" required min="1" max="50" value="<?=$row['DiaChi']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Tổng tiền</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="TongTien" name="TongTien" class="form-control" placeholder= "Tổng tiền" required min="1" max="50" value="<?=$row['TongTien']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Shipping</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="Shipping" name="Shipping" class="form-control" placeholder= "Shipping" required min="1" max="50" value="<?=$row['Shipping']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Tình trạng</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="DaTraTien" name="DaTraTien" class="form-control" placeholder= "DaTraTien" required min="1" max="50" value="<?=$row['DaTraTien']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SỬA ĐƠN HÀNG</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>