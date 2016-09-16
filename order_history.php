<?php
require ('system/depong.php');

hakakses();

// TEMPLATE CONTROL
$ui_register_page = 'order_history';

$customer =mysql_query("SELECT * FROM customer  where email='$_SESSION[email]'");
$datacustomer=mysql_fetch_array($customer);
$kd_customer=$datacustomer['kd_customer'];




if(isset($_GET['kode'])) {
  // Membaca Kode (No Pemesanan)
  $kode = $_GET['kode'];

  // Sql membaca data Pemesanan utama sesuai Kode yang dipilih
  $mySql  = "SELECT *
  FROM
  pemesanan
  INNER JOIN customer ON pemesanan.kd_customer = customer.kd_customer
  INNER JOIN provinsi ON customer.id_prov = provinsi.id_prov
  INNER JOIN kabupaten ON kabupaten.id_prov = provinsi.id_prov AND customer.id_kab = kabupaten.id_kab
  INNER JOIN kecamatan ON kecamatan.id_kab = kabupaten.id_kab AND pemesanan.id_kec = kecamatan.id_kec AND customer.id_kec = kecamatan.id_kec
  INNER JOIN kelurahan ON kelurahan.id_kec = kecamatan.id_kec AND customer.id_kel = kelurahan.id_kel
  WHERE customer.kd_customer='$kd_customer' AND  pemesanan.id_pemesanan ='$kode'";
  $myQry = mysql_query($mySql) or die ("Gagal query");
  $myData= mysql_fetch_array($myQry);


$ongkoskirim =mysql_query("SELECT * FROM ongkos_kirim  where id_kec='$myData[id_kec]'");
$dataongkoskirim=mysql_fetch_array($ongkoskirim);


}




$pemesanan =mysql_query("SELECT * FROM customer, pemesanan  where email='$_SESSION[email]'");
$datacustomer=mysql_fetch_array($customer);

// LOAD HEADER
DataHeadTabel();


loadAssetsHead('Order History');


// Load Menu
LoadMenu();

// Load Search
LoadSearch();
?>




<div class="main">
	<div class="content_top">
		<div class="container">


			<?php
	 //Load SideBar
			LoadSideBar();
			
	 //Load Script Js
			LoadJs();
			
	 //Load Testimony
			LoadTestimony();
			?> 

			
			<div class="col-md-9 content_right">
				<h4 class="head"><span class="m_2">Order</span> History</h4>
				
				<div class="top_grid2">	    
					

          <div class="alert  alert-info span8">

            <strong>Proses pemesanan selesai</strong>
             </BR>1. Data Pemesanan Sudah Tersimpan di Order History .</br>
            2. Silakan lanjutkan Pembayaran Melalui Transfer dengan Tujuan Rekening Bank yang Sudah anda Pilih
            </BR>3. Nominal Yang Harus di Transfer Sudah Dicantumkan Di Data Pembayaran Yang Berwarna Merah .

            </br>4. Setelah Melakukan Pembayaran Lanjutkan Dengan Konfirmasi Pembayaran yang Berada dimenu Order History.
            </br>5. Agar Proses Pengiriman Cepat , Segeralah Melakukan Konformasi Pembayaran.
            </br>6. Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka transaksi dianggap batal.

            </br>
            </br>
            <p align="center">Terimakasih telah melakukan pemesanan online di Roverland Cloth</p>
           
             
            
          </div>
          

        

            
      <div class="row-fluid">
           <div class="span9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <center><label><h3>Data Pemesanan</h3></label></center>
              </div>
              <div class="panel-body">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th><center>No</center> </th>
                  <th><center>No Pemesanan</center> </th>
                  <th><center>Tanggal Pesan</center> </th>
                  <th><center>Batas Pembayaran</center> </th>
                 
                  <th><center>Konfirmasi</center> </th>
                  <th width="30%"><center>Option</center> </th>
                </tr>
              </thead>
              <div class="col-lg-12">
                <?php 
#-------------------------------------------------------------------------------------------------------------------#
#                                                     Query                                                   
#-------------------------------------------------------------------------------------------------------------------#                          



                $no=0;
                 $mySql  = "SELECT * FROM pemesanan INNER JOIN customer ON pemesanan.kd_customer = customer.kd_customer WHERE pemesanan.kd_customer='$kd_customer'";
				$myQry = mysql_query($mySql) or die ("Gagal query");
				while($myData= mysql_fetch_array($myQry)){
$tgl_pemesanan=$myData['tgl_pemesanan'].'|';
$batas_tgl_bayar=kelolatanggal("$tgl_pemesanan","+2 day");

                 $no++;
                 ?>

<tr>
 <td></td>
 <td></td>
  <td></td>
 <td></td>
  <td></td>
 <td></td>
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
</div>
</div>
</div>

<!-- Load Footer -->
<?php 

loadfoot();
JsDataTabel();


?>
<!-- End Load Footer -->
