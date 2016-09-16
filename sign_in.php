<?php
require ('system/depong.php');


uwesmlebu();
// TEMPLATE CONTROL
$ui_register_page = 'sign_in';

// LOAD HEADER
loadAssetsHead('Sign In');

// Load Menu
LoadMenu();
validator();
// FORM PROCESSING
if( isset($_POST['buttonsubmit']) ){
	;
	
	session_start();
	
	//tangkap data dari form login
	$email = $_POST['email'];
	$password = $_POST['password'];	 
	$passwordgaram=md5($_POST['password'],"g4r4m");
	$tingkat_user =$_POST['tingkat_user'];
	
	//untuk mencegah sql injection
	//kita gunakan mysql_real_escape_string
	//$email = mysql_real_escape_string($email);
	
	
	//cek data yang dikirim, apakah kosong atau tidak
	if (empty($email) && empty($password)) {
		//kalau email dan password kosong
		?>
		<script language="JavaScript">alert('Data email dan Password Masih Kosong');</script>
		<?php 
		break;
	}
	
	else if (empty($email)) { 
		//kalau email saja yang kosong
		?>
		<script language="JavaScript">alert('Data email Masih Kosong');</script>
		<?php 
		break;
	}
	
	else if (empty($password)) {
		//kalau password saja yang kosong
		?>
		<script language="JavaScript">alert('Data Password Masih Kosong');</script>
		<?php 
		break;
	}
	

	$op = $_GET['op'];


	if($op=="in") {	

//>>>>>>>>>>>>>>>MEMBER<<<<<<<<<<<<<<<<<
		$cek = mysql_query("SELECT * FROM user, customer WHERE user.id_user=customer.id_user AND email ='$email' AND password='$passwordgaram' AND tingkat_user='$tingkat_user' ");
						if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
							$c = mysql_fetch_array($cek);
							$_SESSION['id_user'] = $c['id_user'];
							$_SESSION['nm_customer'] = $c['nm_customer'];
							$_SESSION['kd_customer'] = $c['kd_customer'];
							$_SESSION['email'] = $c['email'];
							$_SESSION['tingkat_user'] = $c['tingkat_user'];
							?> 

							<script>
							window.location=history.go(-2);
							</script>	

							<?php
							
						}
						else {
							//kalau email ataupun password tidak terdaftar di database
							?>
							<script language="JavaScript">alert('Maaf Login Gagal');</script>
							<?php 
						}
					}

					
					elseif($op=="out"){
						unset($_SESSION['id_user']);
						unset($_SESSION['nm_customer']);
						unset($_SESSION['kd_customer']);
						unset($_SESSION['email']);
						unset($_SESSION['tingkat_user']);
						unset($_SESSION['id_user']);

						header("location:sign_in");
					}
				}


				?>
				<div class="main">

					<div class="about">
						<div class="container">

							<div class="register">
								<div class="col-md-6 login-left">
									<h3>NEW CUSTOMERS</h3>
									<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									<a class="acount-btn" href="./sign_up">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">


									<h3>REGISTERED CUSTOMERS</h3>
									<p>If you have an account with us, please log in.</p>
									<form id="formlogin" method="POST" action="sign_in?op=in" class="form-horizontal form-label-left" enctype="multipart/form-data">
										<div class="form-group">
											<span>email<label>*</label></span>
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
										</div>
										<div class="form-group">
											<span>Password<label>*</label></span>
											<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
										</div>
										<?php// loaderorlogin(); ?>
										<input type="hidden" name="tingkat_user" value="2" >
										<button type="submit" id="buttonsubmit" name="buttonsubmit" class="acount-btn">Submit</button>

									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					var formlogin = $("#formlogin").serialize();
					var validator = $("#formlogin").bootstrapValidator({
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
							password : {
								validators: {
									notEmpty: {
										message: 'Password Harus Diisi'
									},
								}
							}

						}
					});

				</script>

				<!-- Load Footer -->
				<?php 

				loadfoot();
				?>
<!-- End Load Footer -->