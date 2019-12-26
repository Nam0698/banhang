<?php
session_start();
require_once "../class/quantribh.php";
$qt = new quantribh;
$qt-> checkLogin();
$idDT = $_GET['idDT']; settype($idDT,"int");
$kq = $qt->Hang_Xoa($idDT);
header("location:index.php?p=hang_ds");
