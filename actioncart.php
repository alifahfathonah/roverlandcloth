<?php
require ('system/depong.php');

$act=$_GET[act];
require ('inc/tanggal.php');


#TAMBAH
##########################################################3
if ($act=='tambah'){

  #baca variabel 
	$kd_product=$_POST['kd_product'];
	$kd_ukuran=$_POST['kd_ukuran'];
	//$id_detail_product=$_POST['id_detail_product'];

	//echo $id_detail_product;
  //$id_detail_product=$_POST['id_detail_product'];



  #VALIDASI UNTUK FORM JIKA FORM KOSONG  
	if (trim($kd_product)=="") {
		?> <script language="JavaScript">alert('Anda Belum Memilih Product');</script><?php
		header('Location:./detail.product.php?id='.$kd_product);
	}
	if (trim($kd_ukuran)=="") {
		?> <script language="JavaScript">alert('Anda Belum Memilih Size');</script><?php
		header('Location:./detail.product.php?id='.$kd_product);
	}

  #SIMPAN DATA KE DALAM DATABASE jika tidak menemukan error 
	$sid = session_id();

	$sql2 = mysql_query("SELECT * FROM detail_product WHERE kd_product='$kd_product'AND kd_ukuran='$kd_ukuran'");
	$r=mysql_fetch_array($sql2);
	$stok=$r['stock'];
	$id_detail_product=$r['id_detail_product'];
//	INSERT INTO cart_tmp SET id_cart_tmp='', kd_product='$kd_product', qty='1', id_session='$sid', tgl='$tgl_sekarang', jam='$jam_sekarang', stock_tmp='$stok', id_detail_product='$id_detail_product'");
if ($stok == 0){
		echo "stok habis";
	}
	else{
	// check if the product is already
	// in cart table for this session
		$sql = mysql_query("SELECT * FROM cart_tmp
			WHERE kd_product='$kd_product' AND id_session='$sid' AND id_detail_product='$id_detail_product'");
		$ketemu=mysql_num_rows($sql);
		if ($ketemu==0){
		// put the product in cart table
			mysql_query("INSERT INTO cart_tmp SET id_cart_tmp='', kd_product='$kd_product', qty='1', id_session='$sid', tgl='$tgl_sekarang', jam='$jam_sekarang', stock_tmp='$stok', id_detail_product='$id_detail_product'");

		} 
		else {
		// update product quantity in cart table
			$up=mysql_query("UPDATE cart_tmp 
				SET qty = qty + 1
				WHERE id_session ='$sid' AND kd_product='$kd_product' AND id_detail_product='$id_detail_product'");	
				
		}	
		deleteAbandonedCart();
		?> <script language="JavaScript">alert('Product Berhasil Ditambahkan Di Shoping Cart');</script><?php
				header('Location:./cart.php');
		
	}				

}
#END TAMBAH
#_________________________________________________________

#HAPUS
##########################################################3
elseif ( $act=='hapus'){
	?> <script language="JavaScript">alert('Data Cart Telah Dihapus')</script><?php
	mysql_query("DELETE FROM cart_tmp WHERE id_cart_tmp='$_GET[id]'");

	header('Location:./cart');				
}
#END HAPUS
#_________________________________________________________

#UPDATE
##########################################################3
elseif ( $act=='update'){

		$id       = $_POST[id];
		$jml_data = count($id);
	 	$jumlah   = $_POST[jml]; 




	 	// quantity
	  for ($i=1; $i <= $jml_data; $i++)
	  	  {
			$sql2 = mysql_query("SELECT stock_tmp FROM cart_tmp	WHERE id_cart_tmp='".$id[$i]."'");
			while($r=mysql_fetch_array($sql2))
				{
			  		if ($jumlah[$i] > $r[stock_tmp]){
			  			echo "<script>window.alert('Jumlah yang dibeli melebihi stok yang ada');
						window.location=('cart')</script>";
			  		}
			  		elseif($jumlah[$i] == 0){
			  			echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');
						window.location=('cart')</script>";
			  			
					} // tambahan update ada disini
					else{
						mysql_query("UPDATE cart_tmp SET qty = '".$jumlah[$i]."' WHERE id_cart_tmp = '".$id[$i]."'");
						echo "<script>window.alert('Data Shoping Cart Berhasil Di Update');
						window.location=('cart')</script>";
					}
				}
		   }
}
#END HAPUS
#_________________________________________________________
function deleteAbandonedCart(){
		$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
		mysql_query("DELETE FROM cart_tmp 
			WHERE tgl < '$kemarin'");
	}