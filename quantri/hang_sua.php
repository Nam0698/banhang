<?php
$row=null;
$idDT = $_GET['idDT']; settype($idDT,"int");
$kq = $qt->Hang_ChiTiet($idDT);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['TenDT'])){
	$TenDT = $_POST['TenDT'];
	$idTL = $_POST['idTL'];
	$MT = $_POST['MoTa'];
	$Gia = $_POST['Gia'];
	$Ngay = $_POST['Ngay'];
	$urlHinh = $_POST['urlHinh'];
	$qt->Hang_Sua($TenDT, $idTL, $MT, $Gia, $Ngay, $urlHinh, $idDT);
	echo "<script>document.location='index.php?p=hang_ds';</script>";
	exit();
}?>
<style>
	.form-group {margin-bottom:15px;}
	.form-group .form-line {border-bottom:none}
	.form-group .form-control {padding:3px; border:1px solid #999;}
	.form-group .form-line.abc {padding-top:5px;}
	.form-group .form-control{ background: #337ab7;
	border-radius: 6px; color:yellow; font-size:14px;letter-spacing:1px}
	.form-group .form-control::placeholder {color:white}
	#form_validation .col-md-4  {margin-bottom:0px;}
</style>
<head>
	<script src="plugins/ckfinder/ckfinder.js"></script>
	<script type="text/javascript">
	function selectFileWithCKFinder( elementId ) {
		CKFinder.popup( {
			chooseFiles: true, width: 800, height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				});
			finder.on( 'file:choose:resizedImage', function( evt ) {
				var output = document.getElementById( elementId );
				output.value = evt.data.resizedUrl;
			});
			}
		});
	}
	</script>
</head>
<div class="row clearfix">
	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin:auto; float:none">
		<div class="card">
			<div class="header">
				<h2>SỬA HÀNG</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST">
					<div class="form-group form-float">
						<div class="form-group form-float">
							<div class="form-line">
								<input type="text" name="urlHinh" id="urlHinh" class="form-control" onclick="selectFileWithCKFinder('urlHinh')" placeholder="Địa chỉ hình" value="<?=$row['urlHinh']?>">
							</div>
						</div>
							<div class="form-line">
								<input type="text" class="form-control" name="TenDT" required maxlength="100" minlength="5"  placeholder="Tên hàng" value="<?=$row['TenDT']?>">
							</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="Gia" placeholder="Giá" value="<?=$row['Gia']?>" >
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<textarea name="MoTa" cols="30" rows="5" class="form-control no-resize" placeholder="Mô tả" ><?=$row['MoTa']?></textarea>
						</div>
					</div>
					<div class="row cleafix">
					<div class="col-md-6">
						<div class="form-group form-float">
						<div class="form-line">
						<?php $listTL= $qt->ListLoai();?>
							<select class="form-control show-tick" name="idTL" id="idTL">
								<option value="0">-- Chọn Thể loại --</option>
								<?php while ($r = $listTL->fetch_assoc()) { ?>
								<option value="<?=$r['idLoai']?>"><?=$r['TenLoai']?></option>
								<?php } ?>
							</select>
						</div>
						</div>
						</div>
					<div class="col-md-6">
						<div class="form-group form-float">
						<div class="form-line">
						<input type="text" class="datepicker form-control" name="Ngay" placeholder="Ngày">
						</div>
						</div>
					</div>
					</div>
					<div class="form-group form-float">
					</div>
					<button class="btn btn-primary waves-effect" type="submit">CẬP NHẬT HÀNG</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
</script>
<script src="plugins/ckeditor/ckeditor.js"></script> <!--Có thể chèn trực tiếp từ net-->
<link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<script src="plugins/autosize/autosize.js"></script>
<script src="plugins/momentjs/moment.js"></script>
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script>
$(document).ready(function(e) {
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'D/M/Y',
        weekStart: 1, time: false
    });
});
</script>
<script>
$("#form_validation").submit(function(){
	if ($("#idTL").val()==0) {
		alert("Bạn ơi! Chưa chọn loại hàng mà");return false;
	}
});
</script>
<script src=" plugins/ckfinder/ckfinder.js"></script>
