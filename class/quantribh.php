<?php
require "../class/goc.php";
class quantribh extends goc  {

	function thongtinuser($u, $p){
	$u = $this->db->escape_string($u);
	$p = $this->db->escape_string($p);
	$p = md5($p);
	$sql="SELECT * FROM users WHERE username='$u' AND password ='$p'";
	$kq = $this->db->query($sql);
	if ($kq->num_rows==0) return FALSE;
	else return $kq->fetch_assoc();
   }
   function checkLogin() {
      if (isset($_SESSION['login_id'])== false){
            $_SESSION['error'] = 'Bạn chưa đăng nhập';
            $_SESSION['back'] = $_SERVER['REQUEST_URI'];
            header('location:login.php');
            exit();
      }elseif ($_SESSION['login_level']!=1){
            $_SESSION['error'] = 'Bạn không có quyền xem trang này';
            $_SESSION['back'] = $_SERVER['REQUEST_URI'];
            header('location:login.php');
            exit();
      }
   }
   function ListLoai(){
      $sql="SELECT idLoai,TenLoai, ThuTu FROM loaisp ORDER BY ThuTu";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }
   function Loai_Them($TenTL, $ThuTu){
      $TenTL= $this->db->escape_string(trim(strip_tags($TenTL)));
      settype($ThuTu,"int");
      $sql="INSERT INTO loaisp SET TenLoai='$TenTL', ThuTu=$ThuTu";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }
   function Loai_ChiTiet($idTL){
      $sql="SELECT idLoai, TenLoai, ThuTu
      FROM loaisp
      WHERE idLoai=$idTL";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }
   function Loai_Sua($idTL, $TenTL, $ThuTu){
      settype($idTL,"int");
      $TenTL= $this->db->escape_string(trim(strip_tags($TenTL)));
      settype($ThuTu,"int");
      $sql="UPDATE loaisp SET TenLoai='$TenTL', ThuTu=$ThuTu
      WHERE idLoai=$idTL";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }
   function Loai_Xoa($idTL){
      settype($idTL,"int");
      $sql="DELETE FROM loaisp WHERE idLoai=$idTL";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }
   function DemHangTrongLoai($idTL){
      $sql="select count(*) from dienthoai where idLoai=$idTL";
      $kq=$this->db->query($sql);
      $row=$kq->fetch_row();
      return $row[0];
   }
   function ListHang(){
      $sql="SELECT idDT, TenDT, NgayCapNhat, Gia,
      SoLanXem, SoLuongTonKho
      FROM dienthoai
      ORDER BY idDT Desc";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }
   function Hang_Them($TenDT, $idTL, $MT, $Gia, $Ngay, $urlHinh){
      $TenDT = $this->db->escape_string(trim(strip_tags($TenDT)));
      $MT = $this->db->escape_string(trim(strip_tags($MT)));
      $Gia = $this->db->escape_string(trim(strip_tags($Gia)));
      $arr = explode ("/", $Ngay);
      if (count($arr)==3) $Ngay = $arr[2]."-".$arr[1]."-".$arr[0];
      else $Ngay = date("Y-m-d");
      settype($idTL,"int");
      $sql="INSERT INTO dienthoai SET TenDT='$TenDT', idLoai =$idTL, MoTa='$MT',
      Gia = '$Gia', NgayCapNhat='$Ngay', urlHinh= '$urlHinh'";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }
   function Hang_ChiTiet($idDT){
      $sql="SELECT * FROM dienthoai WHERE idDT=$idDT";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }
   function Hang_Sua($TenDT, $idTL, $MT, $Gia, $Ngay, $urlHinh, $idDT){
      $TenDT = $this->db->escape_string(trim(strip_tags($TenDT)));
      $MT = $this->db->escape_string(trim(strip_tags($MT)));
      $Gia = $this->db->escape_string(trim(strip_tags($Gia)));
      $arr = explode ("/", $Ngay);
      if (count($arr)==3) $Ngay = $arr[2]."-".$arr[1]."-".$arr[0];
      else $Ngay = date("Y-m-d");
      settype($idLT,"int");
      $sql="UPDATE dienthoai SET TenDT='$TenDT', MoTa='$MT',
      Gia = '$Gia', NgayCapNhat='$Ngay', urlHinh= '$urlHinh'
      where idDT='$idDT'";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }
   function Hang_Xoa($idDT){
      settype($idDT,"int");
      $sql="DELETE FROM dienthoai WHERE idDT=$idDT";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }

   function ListTaiKhoan(){
      $sql="SELECT idUser, HoTen, Username, DienThoai, idGroup
      FROM users
      ORDER BY idUser Desc";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }

   function TaiKhoan_ChiTiet($idUser){
      $sql="SELECT * FROM users WHERE idUser=$idUser";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }

   function TaiKhoan_Sua($idUser, $HoTen, $Username, $Dienthoai, $idGroup){
      $HoTen = $this->db->escape_string(trim(strip_tags($HoTen)));
      $Username = $this->db->escape_string(trim(strip_tags($Username)));
      $Dienthoai = $this->db->escape_string(trim(strip_tags($Dienthoai)));
      settype($idGroup,"int");
      settype($idUser,"int");
      $sql="UPDATE users SET HoTen='$HoTen', Username='$Username',
      Dienthoai = '$Dienthoai', idGroup=$idGroup
      where idUser=$idUser";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }

   function TaiKhoan_Xoa($idUser){
      settype($idUser,"int");
      $sql="DELETE FROM users WHERE idUser=$idUser";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }

   function ListDonHang(){
      $sql="SELECT idDH, ThoiDiemDatHang, TenNguoiNhan, DTNguoiNhan, DiaChi, TongTien, DaTraTien
      FROM donhang
      ORDER BY idDH Desc";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }

   function DonHang_ChiTiet($idDH){
      $sql="SELECT * FROM donhang WHERE idDH=$idDH";
      $kq = $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
      return $kq;
   }

   function DonHang_Sua($idDH, $TenNguoiNhan, $DTNguoiNhan, $DiaChi, $TongTien, $Shipping, $DaTraTien){
      $TenNguoiNhan = $this->db->escape_string(trim(strip_tags($TenNguoiNhan)));
      $DTNguoiNhan = $this->db->escape_string(trim(strip_tags($DTNguoiNhan)));
      $DiaChi = $this->db->escape_string(trim(strip_tags($DiaChi)));
      settype($TongTien,"int");
      settype($Shipping,"int");
      settype($DaTraTien,"int");
      $sql="UPDATE donhang SET TenNguoiNhan='$TenNguoiNhan', DTNguoiNhan='$DTNguoiNhan',
      DiaChi = '$DiaChi', TongTien=$TongTien, Shipping=$Shipping, DaTraTien=$DaTraTien
      where idDH=$idDH";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }

   function DonHang_Xoa($idDH){
      settype($idDH,"int");
      $sql="DELETE FROM donhang WHERE idDH=$idDH";
      $kq= $this->db->query($sql) ;
      if(!$kq) die( $this-> db->error);
   }

}//class quantritin


