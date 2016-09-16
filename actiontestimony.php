<?php
require ('system/depong.php');

$act=$_GET[act];
require ('inc/tanggal.php');

$kd_testimony=$_POST['kd_testimony'];
$kd_customer=$_POST['kd_customer'];
$isi=$_POST['isi'];
$nm_testimony=$_POST['nama'];

#TAMBAH
##########################################################3
if ($act=='tambah'){

  #baca variabel 

	
	$tambahtestimony=mysql_query("INSERT INTO testimony SET kd_testimony='', nm_testimony='$nm_testimony', kd_customer='$kd_customer', tampilkan='N',  tgl='$tgl_sekarang', jam='$jam_sekarang', isi='$isi'");
?><script language="JavaScript">alert('Data Testimony Berhasil Ditambah')</script>
	<script>
 window.location=history.go(-1);
 </script>		
<?php					

}
#END TAMBAH
#_________________________________________________________

#HAPUS
##########################################################3
elseif ( $act=='hapus'){
	?> <script language="JavaScript">alert('Data Testimony Berhasil Dihapus')</script><?php
	mysql_query("DELETE FROM testimony WHERE kd_testimony='$kd_testimony'");
?>
	<script>
 window.location=history.go(-1);
 </script>		
<?php			
}
#END HAPUS
#_________________________________________________________

#UPDATE
##########################################################3
elseif ( $act=='update'){

		$updatetestimony=mysql_query("UPDATE testimony SET  nm_testimony='$nm_testimony', kd_customer='$kd_customer', tampilkan='N',  tgl='$tgl_sekarang', jam='$jam_sekarang', isi='$isi' WHERE kd_testimony='$kd_testimony'");
?>
<script language="JavaScript">alert('Data Testimony Berhasil DiEdit')</script>
	<script>
 window.location=history.go(-1);
 </script>		
<?php	
} ?>
#END HAPUS
