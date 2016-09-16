<?php
#-------------------------------------------------------------------------------------------------------------------#
#                                                     Information                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                               Created By    : Fajar Nurrohmat                                     #
#                                               Email         : Fajarnur24@gmail.com                                #
#                                               Name File     : actionorderhistory.php                                        #
#                                               Release Date  :                                                     #
#                                               Created       : 20/04/16 02.23                                      #
#                                               Last Modified : 22/04/16 01.08                                      #
#                                                                                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                                SIK BERKAITAN KARO LOGIN                                           #
#-------------------------------------------------------------------------------------------------------------------#

# Include Dari System
require ('system/depong.php');

hakakses();
//include_once "../library/inc.library.php";

// Keterangan : Skrip ini untuk menjalankan Aksi dari file program pemesanan_lihat.php dan pemesanan_tampil.php

# Membaca Kode dari URL
if(empty($_GET['act'])){
	echo "<b>Data yang diubah tidak ada</b>";
	header('location: checkout.detail?kode=$id_pemesanan');
}
elseif($_GET['act']=='hapus')  {

 $id_pemesanan =$_POST['id_pemesanan'];

		
			$mySqlBatal= mysql_query("UPDATE product, pemesanan_detail SET product.dibeli=product.dibeli-pemesanan_detail.qty WHERE product.kd_product=pemesanan_detail.kd_product AND pemesanan_detail.id_pemesanan='$id_pemesanan'")or die ("Gagal query update ".mysql_error());
				
			$itemSql = "SELECT * FROM pemesanan_detail WHERE id_pemesanan='$id_pemesanan'";
			$itemQry = mysql_query($itemSql) or die ("Gagal query ambil data".mysql_error());
			while ($itemRow = mysql_fetch_array($itemQry)) {		
				$jumlahBrg 	= $itemRow['qty'];
				$kodeBrg	= $itemRow['id_detail_product'];

				# Update stok
				$mySqlstokbatal = "UPDATE detail_product SET stock=stock + $jumlahBrg WHERE id_detail_product='$kodeBrg'";
				mysql_query($mySqlstokbatal) or die ("Gagal query update stok".mysql_error());
			}
				mysql_query("DELETE FROM pemesanan WHERE id_pemesanan='$id_pemesanan'"); 
				?> <script language="JavaScript">alert('Pemesanan Berhasil Dibatalkan/dihapus');</script><?php
				echo "<meta http-equiv='refresh' content='0; url=order_history'>";


		
			
    }  	



?>