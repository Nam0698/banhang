<?php
session_start();
require_once "../class/quantribh.php";
$qt = new quantribh;
$qt-> checkLogin();
$idDH = $_GET['idDH']; settype($idDH,"int");
$kq = $qt->DonHang_Xoa($idDH);
header("location:index.php?p=donhang_ds");
