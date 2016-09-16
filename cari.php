<?php
require ('system/depong.php');


// TEMPLATE CONTROL
$ui_register_page = 'cari';

#################################################################################################################3
$filterSql	= "";
// Membaca variabel form
$KeyWord	= isset($_GET['KeyWord']) ? $_GET['KeyWord'] : '';
$txtKeyword	= isset($_POST['txtKeyword']) ? $_POST['txtKeyword'] : $KeyWord;

// Jika tombol Cari diklik
if(isset($_POST['btnCari'])){
	if($_POST) {
         // Skrip pencarian
		$filterSql = "WHERE nm_product LIKE '%$txtKeyword%' OR nm_product LIKE '$txtKeyword%'";
	}
}
else {
	if($KeyWord){
         // Skrip pencarian
		$filterSql = "WHERE nm_product LIKE '%$txtKeyword%' OR nm_product LIKE '$txtKeyword%'";
	}
	else {
		$filterSql = "";
	}
}

# Nomor Halaman (Paging)
$baris	= 10;
$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
$pageSql= "SELECT * FROM product $filterSql ORDER BY kd_product DESC";
$pageQry= mysql_query($pageSql) or die ("error paging: ".mysql_error());
$jml	= mysql_num_rows($pageQry);
$maks	= ceil($jml/$baris);
$mulai	= $baris * ($hal-1);

######################################################################################################################3


// LOAD HEADER
loadAssetsHead('Pencarian Product ');


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
			<script src="assets/admin/paneladmin/js/jquery.min.js"></script>
			<div class="col-md-9 content_right">
				<table width="100%" border="0" cellspacing="6" cellpadding="6">
					<tr>
						<td colspan="2" align="center" bgcolor="#CCCCCC" scope="col"><strong>HASIL PENCARIAN </strong> " <?php echo $txtKeyword; ?> "</td>
					</tr>
				</table>
				<br>
				<table width="100%" border="0" cellspacing="6" cellpadding="6">


					<?php
// Menampilkan daftar barang
					$barang2Sql = "SELECT product.*,  categories.nama_categories FROM product
					LEFT JOIN categories ON product.kd_categories=categories.kd_categories
					$filterSql
					ORDER BY product.kd_product ASC LIMIT $mulai, $baris";
					$barang2Qry = mysql_query($barang2Sql) or die ("Gagal Query".mysql_error());
					$nomor = 0;
					while ($barang2Data = mysql_fetch_array($barang2Qry)) {
						$nomor++;
						$KodeBarang = $barang2Data['kd_product'];
						$KodeKategori = $barang2Data['kd_categories'];

  // Menampilkan gambar utama

						$fileGambar	= $barang2Data['gambarutama'];

// Warna baris data
						if($nomor%2==1) { $warna=""; } else {$warna="#F5F5F5";}
						?>
						<tr>
							<td width="40%" align="center">
								<center>
									<div class="col-md-8">
										<a href="detail.product?id=<?php echo $KodeBarang; ?>">
											<div class="thumbnail">
												<div class="image view view-first">

													<img style="width: 100%; display: block;" src="gallery/product/<?php echo $fileGambar; ?>" alt="image">
													<div class="mask">
														<p><?php echo $datacategories['nama_categories']?></p>
														<div class="tools tools-bottom">

															<a href="detail.product?id=<?php echo $KodeBarang; ?>"><button class="btn"> Geit It<i class="fa fa-cart"></i></button></a>

														</div>
													</div>
												</div>
												<div class="cptn">

													<center><p><?php echo $barang2Data['nama_categories']?></p></center>
												</div>
											</div>
										</div></a>

									</center>
									<td width="76%" valign="top">

										<a href="detail.product?id=<?php echo $KodeBarang; ?>">
											<h4><span class="actual"><?php echo $barang2Data['nm_product']; ?> <?php if ($barang2Data['discount']>0) {?>  DISC : <?php echo $barang2Data['discount'].'  %'; }?> </span></h4>
											<p><?php echo substr($barang2Data['description'], 0, 200); ?> ....</p>
											<strong>Kategori :</strong> <?php echo $barang2Data['nama_categories']; ?>
											<?php
											$sqltotalstock="SELECT SUM(stock) AS total_stock FROM detail_product where kd_product='$barang2Data[kd_product]' ;";
											$querystock = mysql_query($sqltotalstock);
											$datastock= mysql_fetch_assoc($querystock);	
											$totalstock=$datastock['total_stock'];

											?>
											<?php if ($totalstock==0) { ?>
											<span class="actual"><h5>NOT AVAILABLE</h5></span>
											<?php	} else{ ?>
											<div class='judul'> <font color="red"><strong>AVAILABLE</strong></font> </div>
											<?php	} ?>
											<p class="head"><strike><span class="m_2"><?php echo 'IDR. '.format_angka($barang2Data['harga']);?>,-</span><br> </strike><?php echo 'IDR. '.format_angka($barang2Data['harga_discount']);?>,-</p>
											<div class='judul'> <font color="red"><strong></strong></font> </div> </a>
											 <br>	</td>
										</tr>
										<?php } ?>
										<tr>
											<td colspan="2" align="center"><b>Pages:
												<?php
												for ($h = 1; $h <= $maks; $h++) {
													echo "[  <a href='?KeyWord=$txtKeyword&hal=$h'>$h</a> ]";
												}
												?>
											</b></td>
										</tr>
									</table>	 <div class="clearfix"> </div>
								</div> 
							</div>
						</div>  	    
					</div>
				</div>
			</div>
		</div>
		<script src="assets/admin/paneladmin/js/bootstrap.min.js"></script>

		<!-- bootstrap progress js -->
		<script src="assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
		<!-- icheck -->
		<script src="assets/admin/paneladmin/js/icheck/icheck.min.js"></script>

		<script src="assets/admin/paneladmin/js/custom.js"></script>

		<!-- Datatables -->
        <!-- <script src="assets/admin/paneladmin/js/datatables/js/jquery.dataTables.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->

        <script src="assets/admin/paneladmin/js/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/jszip.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/pdfmake.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/vfs_fonts.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/buttons.html5.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/buttons.print.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/admin/paneladmin/js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="assets/admin/paneladmin/js/pace/pace.min.js"></script>
        <!-- Load Footer -->
        <?php 

        loadfoot();
        ?>
<!-- End Load Footer -->