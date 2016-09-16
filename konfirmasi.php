<?php
require ('system/depong.php');

hakakses();

// TEMPLATE CONTROL
$id_pemesanan=$_GET['kode'];
$customer =mysql_query("SELECT * FROM customer  where email='$_SESSION[email]'");
$datacustomer=mysql_fetch_array($customer);
$kd_customer=$datacustomer['kd_customer'];

//tampil value 
$sqltampilkonfirmasi =mysql_query("SELECT * FROM konfirmasi WHERE id_pemesanan='$id_pemesanan' ");
$datatampilkonfirmasi=mysql_fetch_array($sqltampilkonfirmasi);
$tampilkey=number_format($datatampilkonfirmasi['unik_transfer'],0,',','.'); 
$tampiltotaltransfer=number_format($datatampilkonfirmasi['total_transfer'],0,',','.'); 

if (isset($_POST['buttonsubmit'])) {

 	
	$id_pemesanan=$_POST['id_pemesanan'];
 	$unik_keyo=$_POST['unik_key'];
 	$unik_key  = preg_replace("/[^0-9]/", "", $unik_keyo);

 	$kd_bank=$_POST['kd_bank'];

	$total_transfero=$_POST['total_transfer'];
	$total_transfer  = preg_replace("/[^0-9]/", "", $total_transfero);
	
	 $tgl_transfer0=$_POST['date'];
	
	
	 $tgl_transfer_ubah=ubahformatTgl($tgl_transfer0);

	if (empty($unik_key)) {
		?> <script language="JavaScript">alert('Anda Belum Mengisi Data Transfer Unik');</script><?php
		
	}
	if (empty($kd_bank)) {
		?> <script language="JavaScript">alert('Anda Belum Memilih Bank');</script><?php
		
	}
	if (empty($total_transfer)) {
		?> <script language="JavaScript">alert('Anda Belum Mengisi Data Total transfer yang Sudah Anda Bayar');</script><?php
		
	}
	if (empty($tgl_transfer0)) {
		?> <script language="JavaScript">alert('Anda Belum Mengisi Data Tanggal Ketika Anda Transfer');</script><?php
		
	}
	$sqlkonfirmasi =mysql_query("SELECT * FROM konfirmasi ");
	$datakonfirmasi=mysql_fetch_array($sqlkonfirmasi); 
		if($id_pemesanan==$datakonfirmasi['id_pemesanan']){
			$queryupdatekonfirmasi = mysql_query("UPDATE konfirmasi SET status_konfirmasi='Sudah', unik_transfer='$unik_key', total_transfer='$total_transfer', kd_bank='$kd_bank', tgl_transfer='$tgl_transfer_ubah' WHERE id_pemesanan='$id_pemesanan' ") or die(mysql_error());
		}
		else{
			$querytambahkonfirmasi = mysql_query("INSERT INTO konfirmasi SET id_pemesanan='$id_pemesanan', status_konfirmasi='Sudah', unik_transfer='$unik_key', total_transfer='$total_transfer', kd_bank='$kd_bank', tgl_transfer='$tgl_transfer_ubah' ") or die(mysql_error());
		}

	
	


 	

	 	// mendapatkan nomor orders
 	
 	?> <script language="JavaScript">alert('Konfirmasi Pembayaran Berhasil');</script><?php
 	header('Location:order_history');
 }

// LOAD HEADER
 loadAssetsHead('Konfirmasi Pembayaran ');
 datepicker();

 validator();

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
 				<h4 class="head"><span class="m_2">Konfirmasi</span> Pembayaran</h4>





 				<?php 
 			$mySql  = "SELECT *
  FROM
pemesanan
INNER JOIN customer ON pemesanan.kd_customer = customer.kd_customer
  WHERE customer.kd_customer='$kd_customer' AND  pemesanan.id_pemesanan ='$id_pemesanan'";
 				
 				$myQry = mysql_query($mySql) or die ("Gagal query");
 				$myData= mysql_fetch_array($myQry);

 				$tgl_pemesanan=$myData['tgl_pemesanan'].'|';
 				$batas_tgl_bayar=kelolatanggal("$tgl_pemesanan","+2 day"); 


 				?>




 				




 				<input type="hidden" name="unik_keyalsi" id="unik_keyalsi" value="<?php echo $myData['unik_key']; ?>">
 				<input type="hidden" name="total_bayarasli" id="total_bayarasli" value="<?php echo $grantotal;?>">


 				<div class="alert alert-block alert-info fade in">
 					<!--<button type="button" class="close" data-dismiss="alert">×</button>-->
 					<center> Silahkan Isi Data Konfirmasi Dengan Benar Dan Valid</center>
 				</div>
 				<form id="formkonfirmasi" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">

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
 											<tr>
 												<td><strong>Tgl. Batas Pembayarann</strong></td>
 												<td><strong>:</strong></td>
 												<td class="danger"><?php echo IndonesiaTgl($batas_tgl_bayar); ?></td>
 											</tr>
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
 											 <?php 

                        $sqlkonfirmasi =mysql_query("SELECT * FROM konfirmasi WHERE id_pemesanan='$_GET[kode]' ");
                        
                        $ketemu=mysql_num_rows($sqlkonfirmasi);
                        if ($ketemu==0){
                            $abang='danger';
                            $status_konfirmasi='Belum';
                          }else{
                            $abang="success";
                            $status_konfirmasi='Sudah';
                          }
                          ?>


                        <tr>
                          <td><strong>Konfirmasi Pembayaran</strong></td>
                          <td><strong>:</strong></td>
                          <td class="<?php echo $abang;?>"><?php echo $status_konfirmasi; ?></td>
                        </tr>



 										</tbody>
 									</table>   
 								</div>
 							</div>
 							<div class="panel panel-default">
 								<div class="panel-heading">
 									<label>Data Konfirmasi </label>
 								</div>
 								<div class="panel-body">
 									<table class="table table-striped table-bordered">
 										<tbody>
 											<tr>
 												<td>
 													<div class="item form-group">
 														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_bank">Transfer Ke Tujuan Bank  <span class="required">*</span>
 														</label>
 														<div class="col-md-6 col-sm-6 col-xs-12">
 															<select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="kd_bank" name="kd_bank" value="" required>
 																<option value="">-Pilih Bank Tujuan-</option>
 																<?php
				                    //MENGAMBIL NAMA bank YANG DI DATABASE

 																$bank =mysql_query("SELECT * FROM bank  ORDER BY nama_bank");
 																while ($databank=mysql_fetch_array($bank)) {
 																	if($myData['kd_bank']==$databank['kd_bank']){
 																		$cek ="selected";
 																	}
 																	else{
 																		$cek= "";
 																	}
 																	echo "<option $cek value=\"$databank[kd_bank]\">$databank[nama_bank]</option>\n";
 																}
 																
 																?>
 															</select>
 														</div>
 													</div>
 												</td>
 											</tr>
 											<tr>
 												<td>
 													<div class="item form-group">
 														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="unik_key">Unik Transfer <span class="required">*</span>
 														</label>
 														<div class="col-md-6 col-sm-6 col-xs-12">
 															<input id="unik_key" onkeyup="convertToRupiah(this);" <?php if($status_konfirmasi=='Sudah') { ?> value="<?php echo $tampilkey ?>" <?php } ?>type="text" pattern="[0-9.]+" name="unik_key" class="form-control">
 														</div>
 													</div>
 												</td>
 											</tr>
 											<tr>
 												<td>
 													<div class="item form-group">
 														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_transfer">Total Transfer<span class="required">*</span>
 														</label>
 														<div class="col-md-6 col-sm-6 col-xs-12">
 															<div class="input-group">
 																<span class="input-group-addon">Rp.</span>
 																<input <?php if($status_konfirmasi=='Sudah') { ?>value="<?php echo $tampiltotaltransfer ?>"<?php } ?> id="total_transfer" onkeyup="convertToRupiah(this);" type="text" pattern="[0-9.]+" name="total_transfer" class="form-control">
 																<span class="input-group-addon">,-</span>
 															</div>
 														</div>
 													</div>
 												</td>
 											</tr>

 											<tr>
 												<td>
 													<div class="form-group">
 														<label class="col-xs-3 control-label">Tanggal Transfer</label>
 														<div class="col-xs-5 date">
 															<div class="input-group input-append date" id="datePicker">
 																<input type="text" class="form-control"<?php if($status_konfirmasi=='Sudah') { ?> value="<?php echo edittgl($datatampilkonfirmasi['tgl_transfer']); ?>"<?php } ?> name="date" />
 																<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
 															</div>
 														</div>
 													</div>
 												</td>
 											</tr>

 														<input type="hidden" name="id_pemesanan" value="<?php echo $myData['id_pemesanan']; ?>">

 										</tbody>
 									</table>   
 								</div>
 							</div>
 							<div style="text-align:center" class="form-actions no-margin-bottom">
 								<button class="btn btn-large " type="submit" id="buttonsubmit" name="buttonsubmit" >Selesai</button>
 							</div>

 						</form>       

 						<hr>
 						<br><br>
 						<table class="table table-condensed">
 							<thead>
 								<tr>
 									<th width="94%" colspan="3"><strong><h3>Metode Pembayaran </h3></strong></th>
 								</tr>
 								<tr> <th colspan="3">Untuk memberikan kemudahan berbelanja online bersama kami, kami menawarkan metode pembayaran:</th> </tr>
 							</thead>
 							<tbody>
 								<tr>
 									<td width="4%"><img src="images/arow.gif"></td>
 									<td colspan="3"><strong>Transfer Bank : </strong></td>

 								</tr>
 								<tr>
 									<td>&nbsp;</td>
 									<td width="2%" align="center" valign="top">-</td>
 									<td width="94%" colspan="2">Pembayaran bisa dilakukan melalui transfer uang tunai antarbank. Anda dapat melakukan transfer uang tunai melalui bank Anda dan juga melalui ATM. Kami menerima transfer uang tunai melalui rekening Bank BCA dan Bank Mandiri</td>
 								</tr>

 								<tr>
 									<td>&nbsp;</td>
 									<td colspan="3"><strong>Note : </strong></td>
 								</tr>
 								<tr>
 									<td>&nbsp;</td>
 									<td align="center" valign="top">*</td>
 									<td colspan="2">•	Batas pembayaran maksimal adalah  3x24 jam (3 hari) dari waktu pemesanan, melalui metode pembayaran di  atas.</td>
 								</tr>
 								<tr>
 									<td>&nbsp;</td>
 									<td>*</td>
 									<td  colspan="2">Setelah melakukan pembayaran, Anda harus melakukan Konfirmasi Pembayaran (Confirm) pada menu Order History sesuai dengan kode pemesanan Anda.</td>
 								</tr>
 								<tr>
 									<td>&nbsp;</td>
 									<td>&nbsp;</td>
 									<td>&nbsp;</td>
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



 			</div>
 		</div>
 	</div>



 </div>  	    
</div>
</div>
</div>
</div>
<script type="text/javascript">
	function convertToRupiah(objek) {
		separator = ".";
		a = objek.value;
		b = a.replace(/[^\d]/g,"");
		c = "";
		panjang = b.length; 
		j = 0; 
		for (i = panjang; i > 0; i--) {
			j = j + 1;
			if (((j % 3) == 1) && (j != 1)) {
				c = b.substr(i-1,1) + separator + c;
			} else {
				c = b.substr(i-1,1) + c;
			}
		}
		objek.value = c;

	}            
</script>
<!-- daterangepicker -->
 
<script>
	$(document).ready(function() {
		$('#datePicker')
		.datepicker({
			format: 'dd/mm/yyyy'
		})
		.on('changeDate', function(e) {
            // Revalidate the date field
            $('#formkonfirmasi').bootstrapValidator('revalidateField', 'date');
        });

		$('#formkonfirmasi').bootstrapValidator({
			framework: 'bootstrap',
			icon: {
				valid: "fa fa-smile-o",
				invalid: "fa fa-frown-o", 
				validating: "glyphicon glyphicon-refresh"
			},
			fields: {
				total_transfer: {
					validators: {
						notEmpty: {
							message: 'Total Transfer Harus Diisi'
						},
						regexp: {
							regexp: /^[0-9\.]+$/,
							message: 'Karakter Yang Boleh Digunakan Angka'
						},
						identical:{
							field:'total_bayarasli',
							message: 'Total Transfer Tidak Sesuai Dengan Dengan Data Pemesanan'
						},
					}
				},
				unik_key: {
					validators: {
						notEmpty: {
							message: 'Angka Unik Transfer Harus Diisi'
						},
						regexp: {
							regexp: /^[0-9\.]+$/,
							message: 'Karakter Yang Boleh Digunakan Angka'
						}
					}
				},
				
				kd_bank: {
					validators: {
						notEmpty: {
							message: 'Harus Pilih Bank Yang Dituju'
						}
					}
				},
				date: {
					validators: {
						notEmpty: {
							message: 'Tanggal Transfer Tidak Boleh Kosong'
						},
						date: {
							format: 'DD/MM/YYYY',
							message: 'Tanggal Tidak Valid'
							
						}
					}
				},

			}
		});
});
</script>
<!-- Load Footer -->
<?php 

loadfoot();
?>


