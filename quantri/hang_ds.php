<?php
$kq = $qt->ListHang();
?>
<style>
	div.dataTables_wrapper div.dataTables_filter input.form-control {border:1px solid #999;height:23px;}
</style>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        QUẢN TRỊ HÀNG
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>ID / Ngày</th>
                                    <th>Tên DT</th>
                                    <th>Giá</th>
                                    <th>Tồn</th>
                                    <th>Cập nhật / Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($rowDT = $kq->fetch_assoc() ) { ?>
                                <tr>
                                    <td>
                                        <p>idDT: <?=str_pad($rowDT['idDT'], 3, '0', STR_PAD_LEFT)?> </p>
                                        <p><?=date('d/m/Y',strtotime($rowDT['NgayCapNhat']))?></p>
                                        <p>Xem: <?=$rowDT['SoLanXem']?></p>
                                    </td>
                                    <td>
                                        <p><?=$rowDT['TenDT']?></p>
                                    </td>
                                    <td><p><?=$rowDT['Gia']?></p></td>
                                    <td><p><?=$rowDT['SoLuongTonKho']?></p></td>
                                    <td>
                                    <p>
                                    <a href="?p=hang_sua&idDT=<?=$rowDT['idDT']?>" class="btn bg-blue waves-effect">Sửa</a> &nbsp;
                                    <a href="hang_xoa.php?idDT=<?=$rowDT['idDT']?>" class="btn bg-red waves-effect" onClick="return confirm('Xóa hả')">Xóa</a>
                                    </p>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/pages/tables/jquery-datatable.js"></script>
