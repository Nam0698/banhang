<?php
session_start();
require_once "../class/quantribh.php";
$qt = new quantribh;
$qt-> checkLogin();

$idTL = $_GET['idTL']; settype($idTL,"int");

if($qt->DemHangTrongLoai($idTL)>0){

    die("Bạn không xóa được");
    }
$kq = $qt->Loai_Xoa($idTL);
header("location:index.php?p=loaihang_ds");
?>