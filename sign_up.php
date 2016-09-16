<?php
require ('system/depong.php');
session_start();
uwesmlebu();
// TEMPLATE CONTROL
$ui_register_page = 'sign_up';

// LOAD HEADER
loadAssetsHead('Sign Up ');
validator();
$dataKode   = buatKode("customer", "P");
$data_nm_customer = isset($_POST['nm_customer']) ?  $_POST['nm_customer'] : '';

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
  		url: "./inc/jikuk_kabupaten.php",
  		data: "prov="+prov,
  		cache: false,
  		success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
        }
    });
  });
  $("#kota").change(function(){
  	var kota = $("#kota").val();
  	$.ajax({
  		url: "./inc/jikuk_kecamatan.php",
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
  		url: "./inc/jikuk_kelurahan.php",
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
				<h4 class="head"><span class="m_2">Registrasi</span> Customer</h4>
				
				<?php 
# TOMBOL SIMPAN DIKLIK
				if (isset($_POST['buttonsubmit'])) {
# baca variabel 
//    menangkap $post  dan mengamankan inputan dengan fungsi
//    trim, htmlspecialchars dan stripslashes
					$nm_customer  = htmlspecialchars(stripslashes(trim($_POST['nm_customer'])));
					$nm_customer  = ucwords(strtolower($nm_customer));
					$nm_customer  = preg_replace("[^a-zA-Z0-9]", "", $nm_customer);

					$passwordasli=$_POST['password'];
					$password1=$_POST['password'];
					$password=md5($_POST['password'],"g4r4m");

					$email=$_POST['email'];

					$ibu  = htmlspecialchars(stripslashes(trim($_POST['ibu'])));
					$ibu  = ucwords(strtolower($ibu));
					$ibu  = preg_replace("[^a-zA-Z ]", "", $ibu);

					$ayah  = htmlspecialchars(stripslashes(trim($_POST['ayah'])));
					$ayah  = ucwords(strtolower($ayah));
					$ayah  = preg_replace("[^a-zA-Z ]", "", $ayah);

					$hobi  = htmlspecialchars(stripslashes(trim($_POST['hobi'])));
					$hobi  = ucwords(strtolower($hobi));
					$hobi  = preg_replace("[^a-zA-Z ]", "", $hobi);

					$id_kec  = $_POST['id_kec'];
					$id_kec  = str_replace("'","&acute;",$id_kec);

					$kota  = $_POST['kota'];
					$kota  = str_replace("'","&acute;",$kota);

					$prov  = $_POST['prov'];
					$prov  = str_replace("'","&acute;",$prov);

					$id_kel  = $_POST['id_kel'];
					$id_kel  = str_replace("'","&acute;",$id_kel);

					$alamat = $_POST['alamat'];

					$mobile = $_POST['mobile'];

					$gender = $_POST['gender'];

					$pesanError= array();
					if (trim($nm_customer)=="") {
						$pesanError[] = "Data <b>Nama Customer</b> tidak boleh kosong !";    
					}
					if (trim($email)=="") {
						$pesanError[] = "Data <b>Email</b> tidak boleh kosong !";    
					}
					if (trim($password)=="") {
						$pesanError[] = "Data <b>Password</b> tidak boleh kosong !";    
					}
					if (trim($password1)=="") {
						$pesanError[] = "Data <b>Konfirmasi Password</b> tidak boleh kosong !";    
					}
					if (trim($gender)=="") {
						$pesanError[] = "Data <b>Jenis Kelamin</b> tidak boleh kosong !";    
					}
					if (trim($prov)=="") {
						$pesanError[] = "Data <b>Provinsi</b> tidak boleh kosong !";    
					}
					if (trim($kota)=="") {
						$pesanError[] = "Data <b>Kabupaten</b> tidak boleh kosong !";    
					}
					if (trim($id_kec)=="") {
						$pesanError[]="Data <b>Kecamatan</b> Masih kosong !!";
					}
					if (trim($id_kel)=="") {
						$pesanError[]="Data <b>Kelurahan</b> Masih kosong !!";
					}

					if (trim($alamat)=="") {
						$pesanError[]="Data <b>Alamat Lengkap</b> Masih kosong !!";
					}
					if (trim($mobile)=="") {
						$pesanError[]="Data <b>No HP</b> Masih kosong !!";
					}

//VALIDASI email, tidak boleh ada nama kota yang sama
					$cekSql ="SELECT * FROM customer WHERE email='$email'";
					$cekQry = mysql_query($cekSql) or die("Error Query:".mysql_error());
					if (mysql_num_rows($cekQry)>=1) {
						$pesanError[]= "Maaf, Email <b>$email</b> Sudah Terdaftar, ganti dengan email lain";
					}


  #JIKA ADA PESAN ERROR DARI VALIDASI FORM 
					if (count($pesanError)>=1) {
						echo "
						<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
							$noPesan= 0;
							foreach ($pesanError as $indeks => $pesan_tampil) {
								$noPesan++;
								echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";
							}
							echo "</div><br />";
						}
						else{

    #script untuk menyimpan data kedalam database
							$tgl_daftar  =date('Y-m-d');

							$kodeBaru= buatKode("customer", "P");
    #SIMPAN DATA KE DALAM DATABASE jika tidak menemukan error 
							$querytambahcustomer = mysql_query("INSERT INTO customer SET kd_customer='$kodeBaru', id_user='2', nm_customer='$nm_customer', gender='$gender', email='$email', mobile='$mobile', alamat='$alamat', id_prov='$prov', id_kab='$kota', id_kec='$id_kec', id_kel='$id_kel', password='$password', passwordasli='$passwordasli', tgl_daftar='$tgl_daftar' ") or die(mysql_error());

							if ($querytambahcustomer){
								?><script language="JavaScript">alert('Resgistrasi Berhasil, Silahkan Sign in Dengan Email dan Password Yang Sudah Anda Buat');</script>	<?php 
								header('location: ./sign_in');
							}
						}
					}

					?>
					<form id="formcustomer" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
						<div class="alert alert-info" role="alert" id="removeWarning">
							<span class="glyphicon " aria-hidden="true"></span>
							<span class="sr-only"></span>
							Data Login
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_customer">Kode customer <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="kd_customer" name="kd_customer" value="<?php echo $dataKode; ?>" readonly="readonly" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" id="email" name="email" value="<?php  ?>" required class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" id="password" name="password" required value="<?php   ?>"  class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="password1">Konfirmasi Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" id="password1" name="password1" value="<?php  ?>" required class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="alert alert-info" role="alert" id="removeWarning">
							<span class="glyphicon " aria-hidden="true"></span>
							<span class="sr-only"></span>
							Data Pribadi
						</div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_customer">Nama customer <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="nm_customer" value="<?php echo $data_nm_customer; ?>" name="nm_customer" required class="form-control col-md-7 col-xs-12">
							</div>
						</div>       
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Jenis Kelamin <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="radio">
									<label>
										<input type="radio" class="flat"  name="gender" value="Perempuan"> Perempuan
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" class="flat" name="gender" value="Laki-laki"> Laki-Laki
									</label>
								</div>
							</div>
						</div>


						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="prov">Provinsi <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="prov" name="prov" required>
									<option value="">-Pilih Provinsi-</option>
									<?php
                    //MENGAMBIL NAMA PROVINSI YANG DI DATABASE
									$provinsi =mysql_query("SELECT * FROM provinsi ORDER BY nama_prov");
									while ($dataprovinsi=mysql_fetch_array($provinsi)) {
										echo "<option value=\"$dataprovinsi[id_prov]\">$dataprovinsi[nama_prov]</option>\n";
									}
									?>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kota">Kabupaten <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="kota" name="kota" required>
									<option value="">-Pilih Kabupaten-</option>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kec">Kecamatan <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="id_kec" name="id_kec" required>
									<option value="">-Pilih Kecamatan-</option>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kel">Kelurahan <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="id_kel" name="id_kel" required>
									<option value="">-Pilih Kelurahan-</option>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat Lengkap <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="alamat" value="<?php  ?>" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">No HP <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="mobile" value="<?php  ?>" name="mobile" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>

						<div style="text-align:center" class="form-actions no-margin-bottom">
							<button type="submit" id="buttonsubmit" name="buttonsubmit" class="btn btn-success">Submit</button>
						</div>
					</form>









					<div class="clearfix"> </div>
				</div> 
			</div>
		</div>  	    
	</div>
</div>
</div>
</div>

<script type="text/javascript">
	var formcustomer = $("#formcustomer").serialize();
	var validator = $("#formcustomer").bootstrapValidator({
		framework: 'bootstrap',
		feedbackIcons: {
			valid: "fa fa-smile-o",
			invalid: "fa fa-frown-o", 
			validating: "glyphicon glyphicon-refresh"
		}, 
		fields : {
			email: {
				validators:{
					notEmpty: {
						message: 'Email Harus Diisi'
					},
					emailAddress:{
						message: 'Email Tidal valid'
					},
					remote: {
						type: 'POST',
						url: 'remote/remote_email.php',
						message: 'Email Sudah Tersedia'
					},
				}
			},
			password: {
				message: 'Data Password Tidak Benar',
				validators: {
					notEmpty: {
						message: 'Password Harus Diisi'
					},
					stringLength: {
						min: 6,
						max: 30,
						message: 'Password Harus Lebih dari 6 Karakter'
					},
					different: {
						field: 'email',
						message:'Password Harus Beda dengan Email'
					},					
				}
			},
			password1: {
				message: 'Data Password Tidak Benar',
				validators: {
					identical:{
						field:'password',
						message: 'Konfirmasi Password Harus Sama Dengan Password'
					},
					notEmpty: {
						message: 'Password Harus Diisi'
					},
					stringLength: {
						min: 6,
						max: 30,
						message: 'Password Harus Lebih dari 6 Karakter'
					},
					different: {
						field: 'email',
						message:'Password Harus Beda dengan Email'
					},
				}
			},
			nm_customer: {
				message: 'Nama Tidak Benar',
				validators: {
					notEmpty: {
						message: 'Nama Harus Diisi'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'Nama Harus Lebih dari 1 Huruf dan Maksimal 50 Huruf'
					},
					regexp: {
						regexp: /^[a-zA-Z ]+$/,
						message: 'Karakter Yang Boleh Digunakan hanya huruf'
					},
				}
			},
			gender : {
				validators: {
					notEmpty: {
						message: 'Harus Pilih Jenis Kelamin'
					}
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
			id_kel : {
				validators: {
					notEmpty: {
						message: 'Harus Pilih Kelurahan'
					}
				}
			}, 
			alamat : {
				validators: {
					notEmpty: {
						message: 'Harus Pilih Kecamatan'
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
						min: 10,
						max: 30,
						message: 'No Hp Harus Lebih dari 10 Huruf dan Maksimal 30 Huruf'
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