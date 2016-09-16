<?php
require ('system/depong.php');


hakakses();

$edit = mysql_query("SELECT * FROM customer WHERE kd_customer='$_SESSION[kd_customer]'");
$rowks  = mysql_fetch_array($edit);


// TEMPLATE CONTROL
$ui_register_page = 'profile';

// LOAD HEADER
loadAssetsHead('Profile');

// Load Menu
LoadMenu();
validator();
// FORM PROCESSING
$act=$_GET[act];
require ('inc/tanggal.php');



#TAMBAH
##########################################################3

    # TOMBOL SIMPAN DIKLIK
if (isset($_POST['account'] )) {

    # baca variabel 
	
	$kd_customer=$_POST['kd_customer'];
	$email=$_POST['email'];

	$passwordasli=$_POST['password_baru'];
	$password_baruasli=$_POST['password_baru'];
	$password_baru=md5($_POST['password_baru'],"g4r4m");

	$password_lama = $_POST['password_lama'];
	$username = $_POST['username'];

	$password_ulangiasli = $_POST['password_ulangi'];
	$password_ulangi=md5($_POST['password_baru'],"g4r4m");
      #VALIDASI UNTUK FORM JIKA FORM KOSONG



	$pesanError= array();
	if (trim($email)=="") {
		$pesanError[] = "Data <b>Username</b> tidak boleh kosong !";    
	}
	if (trim($password_lama)=="") {
		$pesanError[] = "Data <b>Password Lama</b> tidak boleh kosong !";    
	}
	if (trim($password_baruasli)=="") {
		$pesanError[] = "Data <b>Password Baru</b> tidak boleh kosong !";    
	}
	if (trim($password_ulangi)=="") {
		$pesanError[] = "Data <b>Konfirmasi Password Baru</b> tidak boleh kosong !";    
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
			$r=mysql_fetch_array(mysql_query("SELECT * FROM customer WHERE kd_customer='$kd_customer'"));
			if ($password_lama==$r['passwordasli']){
                // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
				if ($_POST[password_baruasli]==$_POST[password_ulangiasli]){
					mysql_query("UPDATE customer SET email='$email',  password = '$password_baru', passwordasli='$password_baruasli' WHERE kd_customer='$kd_customer' ");
					echo "<script>alert('Update Account Berhasil Silahkan Login Kembali'); window.location = './logout'</script>";
				}
				else{
					echo "<script>alert('Password baru yang anda masukkan tidak sama'); window.location = './profile'</script>";
				}
			}
			else{
				echo "<script>alert('Password Lama anda salah'); window.location = './profile'</script>";
			}
		}

	}
	?>
	<?php 
# TOMBOL SIMPAN DIKLIK
            if (isset($_POST['update'])) {
# baca variabel 
//    menangkap $post  dan mengamankan inputan dengan fungsi
//    trim, htmlspecialchars dan stripslashes
              $nm_customer  = htmlspecialchars(stripslashes(trim($_POST['nm_customer'])));
              $nm_customer  = ucwords(strtolower($nm_customer));
              
              $kd_customer=$_POST['kd_customer'];

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

             $gender = $_POST['gender'];;

  

  #VALIDASI UNTUK FORM JIKA FORM KOSONG

  $pesanError= array();
  if (trim($nm_customer)=="") {
    $pesanError[] = "Data <b>Nama Customer</b> tidak boleh kosong !";    
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
      
    #SIMPAN DATA KE DALAM DATABASE jika tidak menemukan error 
      $updatedatapribadi = mysql_query("UPDATE customer SET  nm_customer='$nm_customer', gender='$gender',  mobile='$mobile', alamat='$alamat', id_prov='$prov', id_kab='$kota', id_kec='$id_kec', id_kel='$id_kel'  WHERE kd_customer='$kd_customer'") or die(mysql_error());

      if ($updatedatapribadi){ 
     echo "<script>alert('Update Data Berhasil '); window.location = './profile'</script>";
       
      }
    }
  }

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
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
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

		<div class="">
			<div class="container">

				<center><h4 class="head"><span class="m_2">Profile</span> <?php echo $_SESSION['nm_customer']; ?></h4></center>
				<br>
				<br>

				<div class="register">
					<div class="col-md-4 login-left">
						<h3>Data Login</h3>
						<p>Untuk Merubah Data Login, Termasuk Email dan Password Silahkan Pilih Tombol Account.</p>
						<a class="acount-btn" data-toggle="modal" data-target="#formModal">Account</a>
					</div>
					<div class="col-md-8 ">

						<div class="login-right">
						<center><h3>Data  Customer</h3>
						<p>Isi Data Anda Dengan Benar Dan Valid</p></center>
						
						</div>
						<form id="formdata" method="POST"  class="form-horizontal form-label-left" enctype="multipart/form-data">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_customer">Nama customer <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="nm_customer" value="<?php echo $rowks['nm_customer']; ?>" name="nm_customer" required class="form-control col-md-7 col-xs-12">
								</div>
							</div>       
							<div class="item form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Jenis Kelamin <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php if ($rowks['gender']==="Perempuan"){ ?>
									<div class="radio">
										<label>
											<input type="radio" class="flat" checked name="gender" value="Perempuan"> Perempuan
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="flat" name="gender" value="Laki-laki"> Laki-Laki
										</label>
									</div>
									<?php } else{ ?>
									<div class="radio">
										<label>
											<input type="radio" class="flat" name="gender" value="Perempuan"> Perempuan
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="flat" checked name="gender" value="Laki-laki"> Laki-Laki
										</label>
									</div>
									<?php  }?>
								</div>
							</div>


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
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kel">Kelurahan <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="id_kel" name="id_kel" value="" required>
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
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat Lengkap <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="alamat" value="<?php echo $rowks['alamat']; ?>" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">No HP <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="mobile" value="<?php echo $rowks['mobile']; ?>" name="mobile" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<input type="hidden" name="update" value="update">
							<input type="hidden" name="kd_customer" value="<?php echo $rowks['kd_customer'];?>">
							<div style="text-align:center" class="form-actions no-margin-bottom">
							<button type="submit" id="buttonsubmit" name="buttonsubmit" class="acount-btn">Submit</button>
							</div>
						</form>
					</div>	
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>



	<div class="col-lg-12">
		<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form role="form" id="formaccount" enctype="multipart/form-data" method="POST" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="H2">Data Account</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label>Kode Customer</label>
								<input name="kd_customer" id="kd_customer" value="<?php echo $rowks['kd_customer']; ?>" class="form-control" readonly placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" id="email" value="<?php echo $rowks['email']; ?>" class="form-control" required placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Password Lama </label>
								<input type="password" name="password_lama" id="password_lama" value="" class="form-control" required placeholder="Password Sekarang/Lama">
							</div>
							<div class="form-group">
								<label>Password Baru</label>
								<input type="password" name="password_baru" id="password_baru" value="" class="form-control" required placeholder="Password Baru">
							</div>
							<div class="form-group">
								<label>Konfirmasi Password Baru</label>
								<input type="password" name="password_ulangi" id="password_ulangi" value="" class="form-control" required placeholder="Konfirmasi Password Baru ">
							</div>

							<input type="hidden" name="kd_customer" value="<?php echo $rowks['kd_customer'];?>">
							<input type="hidden" name="account" value="account">
							<input type="hidden" name="password" id="password" value="<?php echo $rowks['passwordasli'];?>">

						</div>


						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="acount-btn">Update</button>
						</div>


					</div>
				</div>
			</form>
		</div>

	</div>
	<script>
		$(document).ready(function() {
			$('#formaccount').bootstrapValidator({
				framework: 'bootstrap',
				excluded: ':disabled',
				icon: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
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
					password: {
						message: 'Data Password Tidak Benar',
						validators: {
							identical:{
								field:'password',
								message: 'Password Lama Tidak Sama'
							},
							notEmpty: {
								message: 'Password Harus Diisi'
							},
							stringLength: {
								min: 6,
								max: 30,
								message: 'password Harus Lebih dari 6 Karakter Dan Tidak Lebih Dari 30 Karakter'
							},
							different: {
								field: 'email',
								message:'Password Harus Beda dengan email'
							},          
						}
					},
					password_lama: {
						message: 'Data Password Tidak Benar',
						validators: {
							identical:{
								field:'password',
								message: 'Password Lama Tidak Benar'
							},
							notEmpty: {
								message: 'Password Harus Diisi'
							},
							stringLength: {
								min: 6,
								max: 30,
								message: 'password Harus Lebih dari 6 Karakter Dan Tidak Lebih Dari 30 Karakter'
							},
							different: {
								field: 'email',
								message:'Password Harus Beda dengan email'
							},          
						}
					},
					password_baru: {
						message: 'Data Password Tidak Benar',
						validators: {
							
							notEmpty: {
								message: 'Password Harus Diisi'
							},
							stringLength: {
								min: 6,
								max: 30,
								message: 'password Harus Lebih dari dari 6 Karakter Dan Tidak Lebih Dari 30 Karakter'
							},
							different: {
								field: 'email',
								message:'Password Harus Beda dengan email'
							},
						}
					},
					password_ulangi: {
						message: 'Data Password Tidak Benar',
						validators: {
							identical:{
								field:'password_baru',
								message: 'Konfirmasi Password Harus Sama Dengan Password'
							},
							notEmpty: {
								message: 'Password Harus Diisi'
							},
							stringLength: {
								min: 6,
								max: 30,
								message: 'password Harus Lebih dari 6 Karakter Dan Tidak Lebih Dari 30 Karakter'
							},
							different: {
								field: 'email',
								message:'Password Harus Beda dengan Email'
							},
						}
					},
				}
			});
});
</script>

<script type="text/javascript">
  var formdata = $("#formdata").serialize();
  var validator = $("#formdata").bootstrapValidator({
    framework: 'bootstrap',
    feedbackIcons: {
     valid: "fa fa-smile-o",
			invalid: "fa fa-frown-o", 
			validating: "glyphicon glyphicon-refresh"
    }, 
    fields : {
      nm_customer: {
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