<?php
require ('system/depong.php');

if (empty($_SESSION['id_user']&&$_SESSION['nm_customer']&&$_SESSION['tingkat_user']&&$_SESSION['tingkat_user']) && ($_SESSION['tingkat_user']!==2)  ){
 
echo "<script>window.alert('Maaf Teman :( Anda Belum Login . Silahkan Login Terlebih Dahulu . Terimakasih :) ');
						window.location=('sign_in')</script>";		
    //header('location: sign_in');
  }

// TEMPLATE CONTROL



 if (isset($_POST['buttonsubmit'])) {

 	$customer =mysql_query("SELECT * FROM customer  where email='$_SESSION[email]'");
	$datacustomer=mysql_fetch_array($customer);

	$kd_customer=$datacustomer['kd_customer'];



 	// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM cart_tmp WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}
	$sqlongkoskirim = "SELECT * FROM ongkos_kirim WHERE id_kec='$id_kec'";
	$hasilongkoskirim = mysql_query($sqlongkoskirim);
	$dataongkoskirim = mysql_fetch_array($hasilongkoskirim);

 	$id_pemesanan   =buatKode("pemesanan","TS");
 	//$kd_product=$_POST['kd_product'];
 //	$sid=$_POST['sid'];
 	//$id_detail_product=$_POST['id_detail_product'];
 	//$kd_ukuran=$_POST['kd_ukuran'];
 	//$qty=$_POST['qty'];
 	$nm_penerima=$_POST['nm_penerima'];
 	$alamat_penerima=$_POST['alamat_penerima'];
 	$mobile=$_POST['mobile'];
 	$sumberhargatotal=$_POST['sumberhargatotal'];
 	$email=$_POST['email'];


 	$tgl_skrg = date("Ymd");
	$jam_skrg = date("H:i:s");

	$id_kec=$_POST['id_kec'];
	$kd_bank=$_POST['kd_bank'];

	$id_prov=$_POST['prov'];
	$id_kab=$_POST['kota'];
	$id_kel=$_POST['id_kel'];

	$sumberunik=$id_pemesanan;
	$unik_key=intval(substr($sumberunik,-3));

//	$hargatotalasli=round($sumberhargatotal,-3);
	//$hargatotal1=$hargatotalasli+

	

 	/*if (trim($kd_product)=="") {
 		?> <script language="JavaScript">alert('Anda Belum Memilih Product');</script><?php
 		//header('Location:./detail.product.php?id='.$kd_product);
 	}
 	if (trim($kd_ukuran)=="") {
 		?> <script language="JavaScript">alert('Anda Belum Memilih Size');</script><?php
 		//header('Location:./detail.product.php?id='.$kd_product);
 	}
*/


 	$querytambahpemesanan = mysql_query("INSERT INTO pemesanan SET id_pemesanan='$id_pemesanan', kd_customer='$kd_customer', tgl_pemesanan='$tgl_skrg', jam_pemesanan='$jam_skrg', kd_bank='$kd_bank', unik_key='$unik_key', status_pemesanan='Pesan' ") or die(mysql_error());

 	$querytambahpengiriman = mysql_query("INSERT INTO pengiriman SET id_pemesanan='$id_pemesanan', nm_penerima='$nm_penerima', alamat_penerima='$alamat_penerima', mobile_penerima='$mobile',  id_prov='$id_prov', id_kab='$id_kab', id_kec='$id_kec', id_kel='$id_kel', email_penerima='$email', status_pengiriman='Belum' ") or die(mysql_error());

	 	// mendapatkan nomor orders
	$id_orders=mysql_insert_id();

	// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
	$isikeranjang = isi_keranjang();
	$jml          = count($isikeranjang);

	// simpan data detail pemesanan  
	for ($i = 0; $i < $jml; $i++){
		$querytambahdetailpemesanan = mysql_query("INSERT INTO pemesanan_detail SET  id_pemesanan='$id_pemesanan', kd_product='{$isikeranjang[$i]['kd_product']}', id_detail_product='{$isikeranjang[$i]['id_detail_product']}', qty='{$isikeranjang[$i]['qty']}'") or die(mysql_error());

	// update stock product	
		$queryupdatestock = mysql_query("UPDATE detail_product SET stock=stock-{$isikeranjang[$i]['qty']} WHERE id_detail_product={$isikeranjang[$i]['id_detail_product']}") or die(mysql_error());
	}

	// setelah data pemesanan tersimpan, dan stock terupdate next hapus data pemesanan di tabel pemesanan sementara (cart_tmp)
	for ($i = 0; $i < $jml; $i++) {
		mysql_query("DELETE FROM cart_tmp
			WHERE id_cart_tmp = {$isikeranjang[$i]['id_cart_tmp']}");
	}
	?> <script language="JavaScript">alert('Sukses');</script><?php
 		header('Location:checkout.sukses?kode='.$id_pemesanan);
}

// LOAD HEADER
loadAssetsHead('Checkout ');

validator();

// Load Menu
LoadMenu();

// Load Search
LoadSearch();
?>
<script type="text/javascript">
  var htmlobjek;
  $(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=prov>
  $("#prov").change(function(){
    var prov = $("#prov").val();
    $.ajax({
      url: "inc/jikuk_kabupaten.php",
      data: "prov="+prov,
      cache: false,
      success: function(msg){
            $("#kota").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
      url: "inc/jikuk_kecamatan.php",
      data: "kota="+kota,
      cache: false,
      success: function(msg){
        $("#id_kec").html(msg);
      }
    });
  });
  $("#id_kec").change(function(){
    var id_kec = $("#id_kec").val();
    $.ajax({
      url: "inc/jikuk_kelurahan.php",
      data: "id_kec="+id_kec,
      cache: false,
      success: function(msg){
        $("#id_kel").html(msg);
      }
    });
  });
});

</script>
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
				<h4 class="head"><span class="m_2">Proses</span> Checkout</h4>
				



				<div class="panel panel-default">
					<div class="panel-heading">
						Troli Belanja Saya 
					</div>
					<div class="panel-body">
						<div class="">
							<table class="table table-striped  table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th class="centre" colspan="2"><centre>Product</centre></th>
										<th>Harga @ Product</th>
										<th>QTY</th>
										<th>Total Harga Product</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
//$q=mysql_query("SELECT * from cart_tmp, product, detail_product, ukuran WHERE id_session='$sid' AND cart_tmp.kd_product=product.kd_product AND cart_tmp.id_detail_product=detail_product.id_detail_product AND product.kd_product=detail_product.kd_product AND ukuran.kd_ukuran=detail_product.kd_ukuran ");
									$sid = session_id();
									$q=mysql_query("SELECT * from cart_tmp, product, detail_product, ukuran WHERE id_session='$sid' AND cart_tmp.kd_product=product.kd_product AND cart_tmp.id_detail_product=detail_product.id_detail_product AND product.kd_product=detail_product.kd_product AND ukuran.kd_ukuran=detail_product.kd_ukuran ");

									$ketemu=mysql_num_rows($q);
									if($ketemu < 1){
										echo "<script>window.alert('Keranjang Belanjanya masih kosong. Silahkan Anda berbelanja terlebih dahulu');
										window.location=('./product')</script>";
									}
									else{ ?>
									
										<?php 
										$no=1; $hargatotalproduct=0;
										while($data=mysql_fetch_array($q)){
											$harga=$data['harga'];
											$harga= number_format($harga,0,',','.');

											$harga_discount0=$data['harga_discount'];
											$harga_discount= number_format($harga_discount0,0,',','.'); 

											$hargatotalproduct0=$harga_discount0*$data['qty'];
											$hargatotalproduct= number_format($hargatotalproduct0,0,',','.');

											$hargatotal0=$hargatotal0+$hargatotalproduct0;
											$hargatotal= number_format($hargatotal0,0,',','.');
											?>
											<tr>
												<td><center><?php echo $no;?></center></td>
												<td><center><a  href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="./gallery/product/<?php echo $data['gambarutama']?>" data-target="#image-gallery<?php echo $data['kd_slider']; ?>">
													<img class="img-responsive img-circle" width="100px" height="100x" src="./gallery/product/<?php echo $data['gambarutama']?>" alt="Short alt text">
												</a></center></td>
												
												<td ><p class="head"><span class="m_2"><?php echo $data['nm_product']?></span></p>
													<h5>Size : <?php echo $data['nama_ukuran'] ?></h5><br>


												</td>
												<td align="center"><p class="head"><strike><span class="m_2"><?php echo 'IDR. '.$harga?>,-</span><br> </strike><?php echo 'IDR. '.$harga_discount?>,-</p></td>
												<td align="center" >  <?php echo$data['qty'] ;?></td>
												<td align="center"><p class="head"><?php echo 'IDR. '.$hargatotalproduct?>,-</p></td>

												</tr>

												<?php $no++; }?>
												<tr >
													<td colspan="3" align="left" ><p class="head"><span class="keteranganharga">TOTAL HARGA</span></p></td>
													<td align="right">:</td>
													<td colspan="2" align="right" class="danger"><p class="head"><span class="harga"><?php echo 'IDR. '.$hargatotal; ?>,-</span></p></td>

												</tr>
									

											</tbody>
										</table>
									</div>
								</div>

							</div>

<?php 
$edit = mysql_query("SELECT * FROM
  customer

INNER JOIN kelurahan ON customer.id_kel = kelurahan.id_kel
INNER JOIN kecamatan ON customer.id_kec = kecamatan.id_kec
INNER JOIN kabupaten ON kecamatan.id_kab = kabupaten.id_kab
INNER JOIN provinsi ON kabupaten.id_prov = provinsi.id_prov WHERE customer.email='$_SESSION[email]' ");
$rowks  = mysql_fetch_array($edit);
?>

							<div class="alert alert-block alert-info fade in">
        <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
        <strong> Periksa kembali Alamat Tujuan Pengiriman Barang. Ubah alamat pengiriman jika berbeda dengan alamat awal.</strong>
     </div>
       <form id="formcheckout" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
       
        <div class="panel panel-default">
					<div class="panel-heading">
						<label>ALAMAT TUJUAN PEGIRIMAN BARANG</label>
					</div>
					<div class="panel-body">
        <table class="table table-striped table-bordered">
            <tbody>
                
				<tr>
				<td>
					<div class="item form-group">
				      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_penerima">Nama Penerima<span class="required">*</span>
				      </label>
				      <div class="col-md-6 col-sm-6 col-xs-12">
				        <input type="text" id="nm_penerima" value="<?php echo $rowks['nm_customer']; ?>" name="nm_penerima" required class="form-control col-md-7 col-xs-12">
				      </div>
				    </div>
				</td>
				</tr>
				<tr>
				<td>
					<div class="item form-group">
				      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
				      </label>
				      <div class="col-md-6 col-sm-6 col-xs-12">
				        <input type="email" id="email" name="email" value="<?php  echo $rowks['email']; ?>" required class="form-control col-md-7 col-xs-12">
				      </div>
				    </div>
				</td>
				</tr>
				<tr>
				<td>
					<div class="item form-group">
				      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">No HP <span class="required">*</span>
				      </label>
				      <div class="col-md-6 col-sm-6 col-xs-12">
				        <input type="text" id="mobile" value="<?php echo $rowks['mobile']; ?>" name="mobile" required="required" class="form-control col-md-7 col-xs-12">
				      </div>
				    </div>
				</td>
				</tr>
				<tr>
				<td>
					<div class="item form-group">
				               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prov">Provinsi <span class="required">*</span>
				               </label>
				               <div class="col-md-6 col-sm-6 col-xs-12">
				                <select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="prov" name="prov" value="" required>
				                  <option value="">-Pilih Provinsi-</option>
				                  <?php
				                    //MENGAMBIL NAMA PROVINSI YANG DI DATABASE
				                  $provinsi =mysql_query("SELECT * FROM provinsi ORDER BY nama_prov");
				                  while ($dataprovinsi=mysql_fetch_array($provinsi)) {
				                   if ($dataprovinsi['id_prov']==$rowks['id_prov']) {
				                     $cek ="selected";
				                   }
				                   else{
				                    $cek= "";
				                  }
				                  echo "<option value=\"$dataprovinsi[id_prov]\" $cek>$dataprovinsi[nama_prov]</option>\n";
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
				           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kabupaten <span class="required">*</span>
				           </label>
				           <div class="col-md-6 col-sm-6 col-xs-12">
				            <select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="kota" name="kota" value="" required>
				              <option value="">-Pilih Kabupaten-</option>
				              <?php
				                    //MENGAMBIL NAMA kabupaten YANG DI DATABASE
				              $kabupaten =mysql_query("SELECT * FROM kabupaten WHERE id_prov=$rowks[id_prov] ORDER BY nama_kab");
				              while ($datakabupaten=mysql_fetch_array($kabupaten)) {
				               if ($datakabupaten['id_kab']==$rowks['id_kab']) {
				                 $cek ="selected";
				               }
				               else{
				                $cek= "";
				              }
				              echo "<option value=\"$datakabupaten[id_kab]\" $cek>$datakabupaten[nama_kab]</option>\n";
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
				           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kec">Kecamatan <span class="required">*</span>
				           </label>
				           <div class="col-md-6 col-sm-6 col-xs-12">
				            <select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="id_kec" name="id_kec" value="" required>
				              <option value="">-Pilih Kecamatan-</option>
				              <?php
				                    //MENGAMBIL NAMA kecamatan YANG DI DATABASE
				              $kecamatan =mysql_query("SELECT * FROM kecamatan WHERE id_kab=$rowks[id_kab] ORDER BY nama_kec");
				              while ($datakecamatan=mysql_fetch_array($kecamatan)) {
				               if ($datakecamatan['id_kec']==$rowks['id_kec']) {
				                 $cek ="selected";
				               }
				               else{
				                $cek= "";
				              }
				              echo "<option value=\"$datakecamatan[id_kec]\" $cek>$datakecamatan[nama_kec]</option>\n";
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
				           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kel">Kelurahan <span class="required">*</span>
				           </label>
				           <div class="col-md-6 col-sm-6 col-xs-12">
				            <select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="id_kel" name="id_kel" value="" >
				              <option value="">-Pilih Kelurahan-</option>
				              <?php
				                    //MENGAMBIL NAMA kecamatan YANG DI DATABASE
				              $kelurahan =mysql_query("SELECT * FROM kelurahan WHERE id_kec=$rowks[id_kec] ORDER BY nama_kel");
				              while ($datakelurahan=mysql_fetch_array($kelurahan)) {
				               if ($datakelurahan['id_kel']==$rowks['id_kel']) {
				                 $cek ="selected";
				               }
				               else{
				                $cek= "";
				              }
				              echo "<option value=\"$datakelurahan[id_kel]\" $cek>$datakelurahan[nama_kel]</option>\n";
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
				      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_penerima">Alamat Lengkap Penerima<span class="required">*</span>
				      </label>
				      <div class="col-md-6 col-sm-6 col-xs-12">
				        <input type="text" id="alamat_penerima" value="<?php echo $rowks['alamat']; ?>" name="alamat_penerima" required="required" class="form-control col-md-7 col-xs-12">
				      </div>
				    </div>
				</td>
				</tr>
				<tr>
				<td>
					<div class="item form-group">
				           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_bank">Bank Tujuan <span class="required">*</span>
				           </label>
				           <div class="col-md-6 col-sm-6 col-xs-12">
				            <select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="kd_bank" name="kd_bank" value="" required>
				              <option value="">-Pilih Bank Tujuan-</option>
				              <?php
				                    //MENGAMBIL NAMA bank YANG DI DATABASE
				              $bank =mysql_query("SELECT * FROM bank  ORDER BY nama_bank");
				              while ($databank=mysql_fetch_array($bank)) {
				              
				              echo "<option value=\"$databank[kd_bank]\">$databank[nama_bank]</option>\n";
				            }
				            ?>
				          </select>
				        </div>
				      </div>
				</td>
				</tr>
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
            <td><img src="images/arow.gif"></td>
            <td colspan="3"><strong>Kartu Kredit : </strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center" valign="top">-</td>
            <td colspan="2">Kami juga menerima pembayaran dengan kartu kredit yang aman dan juga terpercaya. Untuk kenyamanan Anda, nomor kartu kredit Anda akan melalui system sekuritas yang terbaik. Kami akan menjamin kerahasiaan segala data pada kartu kredit Anda untuk memberikan pengalaman belanja yang aman dan nyaman di situs kami.</td>
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
		<?php
	}
	?> 



</div>  	    
</div>
</div>
</div>
</div>
<script type="text/javascript">
					var formcheckout = $("#formcheckout").serialize();
					var validator = $("#formcheckout").bootstrapValidator({
						framework: 'bootstrap',
						feedbackIcons: {
							valid: "fa fa-smile-o",
							invalid: "fa fa-frown-o", 
							validating: "glyphicon glyphicon-refresh"
						}, 
						excluded: [':disabled'],
						fields : {
      email: {
        validators:{
          notEmpty: {
            message: 'Email Harus Diisi'
          },
          emailAddress:{
            message: 'Email Tidal valid'
          },
          
        }
      },
    
      nm_penerima: {
        message: 'Nama Tidak Benar',
        validators: {
          notEmpty: {
            message: 'Nama Harus Diisi'
          },
          stringLength: {
            min: 1,
            max: 50,
            message: 'Nama Harus Lebih dari 1 Huruf dan Maksimal 50 Huruf'
          },
          regexp: {
            regexp: /^[a-zA-Z ]+$/,
            message: 'Karakter Yang Boleh Digunakan hanya huruf'
          },
        }
      },
      
      prov : {
        validators: {
          notEmpty: {
            message: 'Harus Pilih Provinsi'
          }
        }
      },    
      kota : {
        validators: {
          notEmpty: {
            message: 'Harus Pilih Kabupaten'
          }
        }
      }, 
      id_kec : {
        validators: {
          notEmpty: {
            message: 'Harus Pilih Kecamatan'
          }
        }
      }, 
      
      alamat_penerima : {
        validators: {
          notEmpty: {
            message: 'Harus Diisi'
          }
        }
      }, 
      kd_bank : {
        validators: {
          notEmpty: {
            message: 'Harus Diisi'
          }
        }
      }, 
      mobile: {
        message: 'No HP Tidak Benar',
        validators: {
          notEmpty: {
            message: 'No HP Harus Diisi'
          },
          stringLength: {
            min: 1,
            max: 30,
            message: 'Nama kelurahan Harus Lebih dari 1 Huruf dan Maksimal 30 Huruf'
          },
          regexp: {
            regexp: /^[0-9+]+$/,
            message: 'Format Tidak Benar'
          },

        }
      },
    }
  });


				</script>
<!-- Load Footer -->
<?php 

loadfoot();
?>
<!-- End Load Footer -->