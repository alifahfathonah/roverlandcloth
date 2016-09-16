<?php
require ('system/depong.php');

hakakses();

// TEMPLATE CONTROL
$ui_register_page = 'checkout.sukses';

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
  WHERE customer.kd_customer='$kd_customer' AND  pemesanan.id_pemesanan ='$kode'";
  $myQry = mysql_query($mySql) or die ("Gagal query");
  $myData= mysql_fetch_array($myQry);
  $batas_tgl_bayar=kelolatanggal("$myData[tgl_pemesanan]","+2 day");




$sqlpengiriman=mysql_query("SELECT * FROM 
pengiriman
INNER JOIN kabupaten ON pengiriman.id_kab = kabupaten.id_kab
INNER JOIN kecamatan ON kecamatan.id_kab = kabupaten.id_kab AND pengiriman.id_kec = kecamatan.id_kec
INNER JOIN provinsi ON pengiriman.id_prov = provinsi.id_prov AND kabupaten.id_prov = provinsi.id_prov
INNER JOIN kelurahan ON kelurahan.id_kec = kecamatan.id_kec AND pengiriman.id_kel = kelurahan.id_kel
WHERE pengiriman.id_pemesanan='$kode'
");
$datapengiriman=mysql_fetch_array($sqlpengiriman);



$ongkoskirim =mysql_query("SELECT * FROM ongkos_kirim  where id_kec='$datapengiriman[id_kec]'");
$dataongkoskirim=mysql_fetch_array($ongkoskirim);


}




$pemesanan =mysql_query("SELECT *
FROM
pemesanan
INNER JOIN kabupaten ON pemesanan.id_kab = kabupaten.id_kab
INNER JOIN kecamatan ON kecamatan.id_kab = kabupaten.id_kab AND pemesanan.id_kec = kecamatan.id_kec
INNER JOIN kelurahan ON kelurahan.id_kec = kecamatan.id_kec AND pemesanan.id_kel = kelurahan.id_kel
INNER JOIN provinsi ON pemesanan.id_prov = provinsi.id_prov AND kabupaten.id_prov = provinsi.id_prov
where pemesanan.id_pemesanan='$kode'");
$datapemesanan=mysql_fetch_array($pemesanan);

// LOAD HEADER
loadAssetsHead('Transaksi Sukses ');


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
				<h4 class="head"><span class="m_2">Transaksi</span> Detail</h4>
				
				<div class="top_grid2">	    
					

          <div class="alert  alert-success span8">

            <strong>Proses pemesanan selesai</strong>
             </BR>1. Data Pemesanan Sudah Tersimpan di Order History .</br>
            2. Silakan lanjutkan Pembayaran Melalui Transfer dengan Tujuan Rekening Bank yang Sudah anda Pilih
            </BR>3. Nominal Yang Harus di Transfer Sudah Dicantumkan Di Data Pembayaran Yang Berwarna Merah .
            </br>4. Setelah Melakukan Pembayaran Lanjutkan Dengan Konfirmasi Pembayaran yang Berada dimenu Order History.
            </br>
            5. Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka transaksi dianggap batal.
            </br>
            </br>
            <p align="center">Terimakasih telah melakukan pemesanan online di Roverland Cloth</p>
           
             
            
          </div>
          
          <div class="row-fluid">
           <div class="span9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <center><label><h3>Transaksi Detail</h3></label></center>
              </div>
              <div class="panel-body">
                <table class="table table-striped ">
                  <tbody>
                    <tr>
                      <td ><strong>No</strong></td>
                      <td ><strong>:</strong></td>
                      <td ><?php echo $myData['id_pemesanan']; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Tgl.Pemesanan</strong></td>
                      <td><strong>:</strong></td>
                      <td><?php echo IndonesiaTgl($myData['tgl_pemesanan']); ?></td>
                    </tr>
                    <tr>
                      <td><strong>Waktu Pemesanan</strong></td>
                      <td><strong>:</strong></td>
                      <td><?php echo $myData['jam_pemesanan']; ?></td>
                    </tr>
                    <tr >
                      <td><strong>Batas Tgl. Pembayaran</strong></td>
                      <td><strong>:</strong></td>
                      <td class="danger"><?php echo IndonesiaTgl($batas_tgl_bayar); ?></td>
                    </tr>
                    <tr>
                      <tr>
                        <td><strong>Kode Customer</strong></td>
                        <td><strong>:</strong></td>
                        <td><?php echo $myData['kd_customer']; ?></td>
                      </tr>
                      <tr>
                        <td><b>Nama Customer</b></td>
                        <td><strong>:</strong></td>
                        <td><?php echo $myData['nm_customer']; ?></td>
                      </tr>
                      <tr>
                      <tr>
                          <td><strong>Unik Transfer</strong></td>
                          <td><strong>:</strong></td>
                          <td><?php echo $myData['unik_key']; ?></td>
                        </tr>

                      </tbody>
                    </table>   
                  </div>
                </div>



                <div class="row-fluid">
                 <div class="span9">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <center><label><h3>Data Pengiriman</h3></label></center>
                    </div>
                    <div class="panel-body">
                      <table class="table table-striped ">
                        <tbody>
                         <tr>
                           <td><strong>Nama Penerima</strong></td>
                           <td><strong>:</strong></td>
                           <td><?php echo $datapengiriman['nm_penerima']; ?></td>
                         </tr>
                         <tr>
                           <td><strong>Provinsi</strong></td>
                           <td><strong>:</strong></td>
                           <td><?php echo $datapengiriman['nama_prov']; ?></td>
                         </tr>
                         <tr>
                           <td><strong>Kota/Kabupaten</strong></td>
                           <td><strong>:</strong></td>
                           <td><?php echo $datapengiriman['nama_kab']; ?></td>
                         </tr>
                         <tr>
                          <td><strong>Kecamatan</strong></td>
                          <td><strong>:</strong></td>
                          <td><?php echo $datapengiriman['nama_kec']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Kelurahan</strong></td>
                          <td><strong>:</strong></td>
                          <td><?php echo $datapengiriman['nama_kel']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Alamat Lengkap Penerima</strong></td>
                          <td><strong>:</strong></td>
                          <td><?php echo $datapengiriman['alamat_penerima']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>No HP</strong></td>
                          <td><strong>:</strong></td>
                          <td><?php echo $datapengiriman['mobile_penerima']; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Jenis Pengiriman</strong></td>
                          <td><strong>:</strong></td>
                          <td>Paket Reguler</td>
                        </tr>
                        <tr>
                          <td><strong>Estimasi Pengiriman</strong></td>
                          <td><strong>:</strong></td>
                          <td><?php echo $dataongkoskirim['estimasi_reg']; ?> Hari</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>

                        <tr>
                          <td><strong>Status Bayar </strong></td>
                          <td><strong>:</strong></td>
                          <td><strong><?php echo $myData['status_pemesanan']; ?></strong></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>

                      </tbody>
                    </table>   
                  </div>
                </div>

               <div class="row-fluid">
                 <div class="span9">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <center><label><h3>Total Pembayaran</h3></label></center>
                    </div>
                    <div class="panel-body"> 
                    <div class="table-responsive">
          <table class="table table-bordered" >
           <thead>
            <tr>
             <th  align="center" bgcolor="#CCCCCC"><strong>No</strong></th>
             <th  bgcolor="#CCCCCC"><strong>Kode </strong></th>
             <th  bgcolor="#CCCCCC"><strong>Nama Product</strong></th>
             <th  bgcolor="#CCCCCC"><strong>Size</strong></th>
             <th  align="right" bgcolor="#CCCCCC"><strong>Harga </strong></th>
             <th  align="right" bgcolor="#CCCCCC"><strong>Jumlah</strong></th>
             <th  align="right" bgcolor="#CCCCCC"><strong>Total </strong></th>
           </tr>
           <?php
      // Deklarasi variabel
           $subTotal = 0;
           $totalBarang = 0;
           $totalBiayaKirim = 0;
           $totalHarga = 0;
           $totalBayar =0;
           $unik_transfer =0;

      // SQL Menampilkan data Barang yang dipesan
          
                  $sid = session_id();
                  $q=mysql_query("SELECT *
FROM
pemesanan_detail
INNER JOIN product ON pemesanan_detail.kd_product = product.kd_product
INNER JOIN detail_product ON detail_product.kd_product = product.kd_product AND pemesanan_detail.id_detail_product = detail_product.id_detail_product
INNER JOIN ukuran ON detail_product.kd_ukuran = ukuran.kd_ukuran WHERE pemesanan_detail.id_pemesanan='$kode'
");

                  
                  
                    $no=1; $hargatotalproduct=0;
                    while($tampilData=mysql_fetch_array($q)){

                      $berat=$tampilData['berat']*$tampilData['qty'];

                      $totalberat+=$berat/1000;

                      $bulatberat=ceil($totalberat);

                      $hargaberattotal=$bulatberat*ceil($dataongkoskirim['reg']);
                      $rphargaberattotal=number_format($hargaberattotal,0,',','.'); 


                      $harga=$tampilData['harga'];
                      $harga= number_format($harga,0,',','.');

                      $harga_discount0=$tampilData['harga_discount'];
                      $harga_discount= number_format($harga_discount0,0,',','.');

                      $hargapaketmodal=$dataongkoskirim['reg'];
                      $harga_ongkos= number_format($hargapaketmodal,0,',','.'); 

                      $hargatotalproduct0=$harga_discount0*$tampilData['qty'];
                      $hargatotalproduct= number_format($hargatotalproduct0,0,',','.');

                      $hargatotal0=$hargatotal0+$hargatotalproduct0;
                      $hargatotal= number_format($hargatotal0,0,',','.');
                      $bulathargatotal=round($hargatotal0,-3);

                      $grandtotal0=$bulathargatotal+$hargaberattotal+$myData['unik_key'];;
                      $grantotal= number_format($grandtotal0,0,',','.');
                      ?>
          </thead>
          <tbody>
            <tr>
             <td align="center"><?php echo $no; ?></td>
             <td ><strong><?php echo $tampilData['kd_product']; ?></strong></td>
             <td align="center"><strong><?php echo $tampilData['nm_product']; ?></strong></td>
             <td align="center"><strong><?php echo $tampilData['nama_ukuran']; ?></strong></td>
             <td align="right"><strong><?php echo'Rp. '.$harga_discount; ?>,-</strong></td>
             <td align="center"><?php echo $tampilData['qty']; ?></td>
             <td align="right"><b><?php echo 'Rp. '.$hargatotalproduct; ?>,-</b></td>

           </tr>

           <?php $no++; } ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
    </tr>
    <tr>
     <td colspan="6" align="right"><strong>Total Belanja (Rp) : </strong></td>
     <td align="right"><?php echo 'Rp. '.$hargatotal; ?>,-</td>
   </tr>
   <tr>
     <td colspan="6" align="right"><strong>Harga Ongkos Kirim Ke <?php echo $myData['nama_kec']?>   : </strong></td>
     <td colspan="6" align="right"><?php echo 'Rp. '.$harga_ongkos; ?>,- / Kg</td>
   </tr>
   <tr>
     <td colspan="6" align="right"><strong>Total Berat   : </strong></td>
     <td colspan="6" align="right"><?php echo $totalberat; ?> Kg</td>
   </tr>
   <tr>
     <td colspan="6" align="right"><strong>Total Biaya Kirim  : </strong></td>
     <td colspan="6" align="right"><?php echo 'Rp. '.$rphargaberattotal; ?>,-</td>
   </tr>
   <tr>
   <tr>
     <td colspan="6" align="right"><strong>Unik Transfer : </strong></td>
     <td colspan="6" align="right"><?php echo $myData['unik_key']; ?></td>
   </tr>
   <tr>
     <td colspan="6" align="right"><strong>GRAND TOTAL  (Rp) : </strong></td>
     <td align="right"><?php echo 'Rp. '.$grantotal; ?>,-</td>
   </tr>
   <tr>
     <td colspan="6" align="right" class="danger" >Nominal yang harus <b>Ditransfer</b> adalah </td>
      <td align="right" class="danger"><font color="red"><b><h4><?php echo 'Rp. '.$grantotal; ?>,-</h4></b> </font></td>
   </tr>
<?php   mysql_query("UPDATE pemesanan Set grandtotal='$grandtotal0' WHERE id_pemesanan='$kode' "); ?>
<?php   mysql_query("UPDATE pengiriman Set biayakirim='$hargaberattotal' WHERE id_pemesanan='$kode' "); ?>
 </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="row-fluid">
                 <div class="span9">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <center><label><h3>Data Bank Roverland Cloth</h3></label></center>
                    </div>
                    <div class="panel-body">
<table class="table table-bordered" border="1">
  <tbody>
  <?php
   $querybank=mysql_query("SELECT * FROM bank ");
   $no=1; 
   while($databank=mysql_fetch_array($querybank)){ ?>
    <tr>
      <td align="center" colspan="2" width="20%"><img img class="img-responsive " width="100px" height="100x" src="assets/images/bank/<?php echo $databank['foto']?>"></td>
      <td><p><strong>  
        A/C          : <?php echo $databank['no_rekening']?><br />
        A/N          : <?php echo $databank['pemilik']?><br />
        Bank         : <?php echo $databank['nama_bank']?></strong></p></td>
      </tr>
      <?php }?>
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
</div>
</div>
</div>        
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
?>
<!-- End Load Footer -->