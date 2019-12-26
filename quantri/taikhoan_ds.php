<style>
	div.dataTables_wrapper div.dataTables_filter input.form-control {border:1px solid #999;height:23px;}
</style>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        QUẢN TÀI KHOẢN
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Username</th>
                                    <th>Điện thoại</th>
                                    <th>IDGroup</th>
                                    <th>Cập nhật / Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $kq = $qt->ListTaiKhoan(); ?>
                            <?php while ($rowTK = $kq->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?=$rowTK['idUser']?></td>
                                    <td><?=$rowTK['HoTen']?></td>
                                    <td><?=$rowTK['Username']?></td>
                                    <td><?=$rowTK['DienThoai']?></td>
                                    <td><?=$rowTK['idGroup']?></td>
                                    <td><a href="?p=taikhoan_sua&idUser=<?=$rowTK['idUser']?>" class="btn bg-blue waves-effect">Sửa</a> &nbsp;
                                    <a href="taikhoan_xoa.php?idUser=<?=$rowTK['idUser']?>" class="btn bg-red waves-effect" onClick="return confirm('Xóa hả')">Xóa</a>
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
