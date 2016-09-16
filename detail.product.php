<?php
require ('system/depong.php');

// TEMPLATE CONTROL
$ui_register_page = 'detail.product';

// LOAD HEADER
loadAssetsHead('Detail Product');

// Load Menu
LoadMenu();
validator();

$kd_product=$_GET['id'];

$sql="SELECT * FROM product where kd_product='$kd_product'";
$s = mysql_query($sql);
$data= mysql_fetch_array($s);

$kd_categories=$data['kd_categories'];

$harga_discount=$data['harga_discount'];
$harga_discount= number_format($harga_discount,0,',','.');

$harga=$data['harga'];
$harga= number_format($harga,0,',','.');



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
			
			<div class="col-md-9 single_right">


<div class="single_top">
	<div class="single_grid">
		<div class="grid images_3_of_2">
			<ul id="etalage">
				<?php if (!empty($data['gambarutama'])) { ?>
				<li>

					<?php if ($data['discount']>0) {?>
					<div class=" images_1_of_4"><div class="discount">
						<span class="percentage"><?php echo $data['discount'].'%'?></span></div>
					</div>
					<?php     	  } ?>
					<img class="etalage_thumb_image" src="gallery/product/<?php echo $data['gambarutama'];?>" class="img-responsive" />
					<img class="etalage_source_image" src="gallery/product/<?php echo $data['gambarutama'];?>" class="img-responsive" title="" />

				</li>

				<?php } ?>
				<?php if (!empty($data['gambar1'])) { ?>
				<li>
					<?php if ($data['discount']>0) {?>
					<div class=" images_1_of_4"><div class="discount">
						<span class="percentage"><?php echo $data['discount'].'%'?></span></div>
					</div>
					<?php     	  } ?>
					<img class="etalage_thumb_image" src="gallery/product/<?php echo $data['gambar1'];?>" class="img-responsive" />
					<img class="etalage_source_image" src="gallery/product/<?php echo $data['gambar1'];?>" class="img-responsive" title="" />
				</li>
				<?php }else {
					echo "<li></li>";
				} ?>
				<?php if (!empty($data['gambar2'])) { ?>
				<li>
					<?php if ($data['discount']>0) {?>
					<div class=" images_1_of_4"><div class="discount">
						<span class="percentage"><?php echo $data['discount'].'%'?></span></div>
					</div>
					<?php     	  } ?>
					<img class="etalage_thumb_image" src="gallery/product/<?php echo $data['gambar2'];?>" class="img-responsive"  />
					<img class="etalage_source_image" src="gallery/product/<?php echo $data['gambar2'];?>"class="img-responsive"  />
				</li>
				<?php } ?>
				<?php if (!empty($data['gambar3'])) { ?>
				<li>
					<?php if ($data['discount']>0) {?>
					<div class=" images_1_of_4"><div class="discount">
						<span class="percentage"><?php echo $data['discount'].'%'?></span></div>
					</div>
					<?php     	  } ?>
					<img class="etalage_thumb_image" src="gallery/product/<?php echo $data['gambar3'];?>" class="img-responsive"  />
					<img class="etalage_source_image" src="gallery/product/<?php echo $data['gambar3'];?>"class="img-responsive"  />
				</li>
				<?php } ?>

			</ul>

			<div class="clearfix"></div>		
		</div> 
		<div class="desc1 span_3_of_2">


			<h1><?php echo $data['nm_product'];?></h1>
			<?php
			$sqltotalstock="SELECT SUM(stock) AS total_stock FROM detail_product where kd_product='$kd_product' ;";
			$querystock = mysql_query($sqltotalstock);
			$datastock= mysql_fetch_assoc($querystock);	
			$totalstock=$datastock['total_stock'];

			?>
			<?php if ($totalstock==0) { ?>
			<span class="actual">NOT AVAILABLE</span>
			<?php	} else{ ?>
			<span class="actual">AVAILABLE</span>
			<?php	} ?>

			<div class="price_single">
				<span class="reducedfrom"><?php echo "Rp. $harga,-";?></span>
				<span class="actual"><?php echo "Rp. $harga_discount,-";?></span>
			</div>
			<h2 class="quick">Quick Overview:</h2>
			<p class="quick_desc"><?php echo $data['description'];?></p>

			<form id="formcart" method="POST" action="actioncart?act=tambah" class="form-horizontal form-label-left" enctype="multipart/form-data">


<?php if($kd_categories=='KT005' || $kd_categories=='KT006' || $kd_categories=='KT008' || $kd_categories=='KT011' || $kd_categories=='KT014'){
	$size =mysql_query("SELECT * FROM detail_product , ukuran WHERE detail_product.kd_ukuran=ukuran.kd_ukuran AND kd_product='$kd_product' AND stock>0 ");
						$datasize=mysql_fetch_array($size); ?>
<input type="hidden" name="kd_ukuran" value="<?php echo $datasize['kd_ukuran'];?>">


<?php	} else{ ?>
				<div class="form-group">
					<label>Size</label>
					<select type="text" class="form-control chzn-select col-md-7 col-xs-12" id="kd_ukuran" name="kd_ukuran" value="" >
						<option value="">-Choose Size-</option>
						<?php
                    //MENGAMBIL NAMA size YANG DI DATABASE
						$size =mysql_query("SELECT * FROM detail_product , ukuran WHERE detail_product.kd_ukuran=ukuran.kd_ukuran AND kd_product='$kd_product' AND stock>0 ");
						while ($datasize=mysql_fetch_array($size)) {

							echo "<option value=\"$datasize[kd_ukuran]\" >$datasize[nama_ukuran] ($datasize[stock] stocks Is available)</option>\n";
						}
						?>
					</select>
				</div>
				<?php	} ?>
				<?php if ($totalstock==0) { }else{?>
				<input type="hidden" name="kd_product" value="<?php echo $kd_product ?>" >
				<button type="submit" id="buttonsubmit" name="buttonsubmit" class="btn bt1 btn-primary btn-normal btn-inline">Add To Cart</button>
				<?php } ?>	
			</form>
		</div>


		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="sap_tabs">	
	<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
		<ul class="resp-tabs-list">
			<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
			<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>

			<div class="clear"></div>
		</ul>				  	 
		<div class="resp-tabs-container">
			<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
				<div class="facts">
					<ul class="tab_list">
						<?php echo $data['description'];?>
					</ul>           
				</div>
			</div>	
			<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
				<div class="facts">
					<ul class="tab_list">
						<?php echo $data['review'];?>
					</ul>
				</div>
			</div>	

		</div>
	</div>
</div>
<h3 class="single_head">Related Products</h3>
<div class="related_products">

<?php
					$sql="SELECT * FROM product where kd_categories='$kd_categories' order by RAND() LIMIT 6 ";
					$result = mysql_query($sql);
			$num = mysql_num_rows($result); // menghitung jumlah record
			$i = 1;
			if($num>0){     // jika ditemukan record akan ditampilkan
			while($row = mysql_fetch_array($result)){   // perintah mysql_fetch_array untuk    
				

				$harga=$row['harga'];
				$harga= number_format($harga,0,',','.');

				$harga_discount=$row['harga_discount'];
				$harga_discount= number_format($harga_discount,0,',','.');    					
				?> 
				<div class="col-md-4 top_grid1-box1"><a href="./detail.product?id=<?php echo $row[0]?>">
					<div class="grid_1">
						<div class="b-link-stroke b-animate-go  thickbox">
							<?php if ($row['discount']>0) {?>
							<div class=" images_1_of_4"><div class="discount">
								<span class="percentage"><?php echo $row['discount'].'%'?></span></div>
							</div>
							<?php     	  } ?>

							
							<?php echo "<img src='gallery/product/{$row['gambarutama']}' class='img-responsive'width='250%' height='338%' alt=''/> "; ?>
							<div class="grid_2">
								<center><p><?php echo $row['nm_product']?></p></center>
								<ul class="grid_2-bottom">
									<div class=" images_1_of_4">
										<p><?php if ($row['discount']>0) {?><span class="strike"><?php echo 'IDR. '.$harga?>,-</span></br><span class="price"><?php echo 'IDR. '.$harga_discount?>,-</span></p><?php } else {?><span class="strike"></span></br><span class="price"><?php echo 'IDR. '.$harga_discount?>,-</span></p><?php } ?>
									</div>
									
								</ul>
								<ul class="grid_2-bottom">
									<li ><center><div class="btn btn-primary btn-normal btn-inline " target="_self" title="Get It">Get It</div></center></li>
									<div class="clearfix"> </div>
									
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div></a>

				<?php
				if($i % 3 == 0){
					?>
					<div class="clearfix"> </div>
				</div>		
				<div class='top_grid2'>
					<?php
				}
				$i++;
				
			} ?>
			
			<?php	}
							 else {        // jika tidak ditemukan record
							 	echo"Tidak ada record";
							 }
							 
							 ?>

							 <div class="clearfix"> </div>

</div>

</div>
</div>
</div>
</div>
<script type="text/javascript">
	var formcart = $("#formcart").serialize();
	var validator = $("#formcart").bootstrapValidator({
		framework: 'bootstrap',
		feedbackIcons: {
			valid: "fa fa-smile-o",
			invalid: "fa fa-frown-o", 
			validating: "glyphicon glyphicon-refresh"
		}, 
		excluded: [':disabled'],
		fields : {

			kd_ukuran : {
				validators: {
					notEmpty: {
						message: 'Please Choose Size'
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