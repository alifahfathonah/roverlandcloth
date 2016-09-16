<?php
require ('system/depong.php');

// TEMPLATE CONTROL
$ui_register_page = 'terms_of_service';

// LOAD HEADER
loadAssetsHead('Terms Of Service');

// Load Menu
LoadMenu();

$q=mysql_query("SELECT * from halaman where kd_halaman='TERMSOFSERVICE'");
$data=mysql_fetch_array($q); ?>
<div class="main"><center><h4 class="head"><span class="m_2">Halaman</span> <?php echo $data['title'] ?></h4></center>
	<div class="content_top">
		<div class="container">
			<div class="about_top">
				<p align="justify"><?php echo $data['content'] ?></p>
			</div>
		</div>
	</div>
</div>
<!-- Load Footer -->
<?php 

loadfoot();
?>
<!-- End Load Footer -->