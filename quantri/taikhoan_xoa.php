<?php
session_start();
require_once "../class/quantribh.php";
$qt = new quantribh;
$qt-> checkLogin();
$idUser = $_GET['idUser']; settype($idUser,"int");
$kq = $qt->TaiKhoan_Xoa($idUser);
header("location:index.php?p=taikhoan_ds");
