<?php
$row=null;
$idTL = $_GET['idTL']; settype($idTL,"int");
$kq = $qt->Loai_ChiTiet($idTL);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['TenTL'])){
    $TenTL = $_POST['TenTL'];
    $ThuTu = $_POST['ThuTu'];
    $qt->Loai_Sua($idTL, $TenTL, $ThuTu);
    echo "<script>document.location='index.php?p=loaihang_ds';</script>";
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
                    SỬA LOẠI HÀNG
                </h2>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="TenTL"> Tên Loại </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TenTL" name="TenTL" class="form-control" placeholder="Nhập tên loại"  maxlength= "20" minlength="3" required value="<?=$row['TenLoai']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                        <label for="ThuTu">Thứ tự</label>
                        </div>
                        <div class="col-sm-9">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder= "Nhập thứ tự" required min="1" max="1000" value="<?=$row['ThuTu']?>" >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SỬA LOẠI</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>