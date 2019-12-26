<?php
if (isset($_POST['TenLoai'])){
    $TenTL = $_POST['TenLoai'];
    $ThuTu = $_POST['ThuTu'];
    $qt->Loai_Them($TenTL,  $ThuTu);
    echo "<script>document.location='index.php?p=loaihang_ds';</script>";
    exit();
}
?>

<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
        <div class="card">
            <div class="header">
                <h2>
                    THÊM LOẠI HÀNG
                </h2>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="TenLoai"> Tên Loại </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TenLoai" name="TenLoai" class="form-control" placeholder="Nhập tên loại"  maxlength= "20" minlength="3" required>
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
                                    <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder= "Nhập thứ tự" required min="1" max="1000">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">THÊM LOẠI</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>