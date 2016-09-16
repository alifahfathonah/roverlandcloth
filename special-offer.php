<?php
require ('system/depong.php');


// TEMPLATE CONTROL
$ui_register_page = 'special-offer';

// LOAD HEADER
loadAssetsHead('Special Offer');

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
				<h4 class="head"><span class="m_2">Special</span> Offer</h4>
				
				<div class="top_grid2">	    
					<?php
					$sql="SELECT * FROM product where discount>=10 order by RAND() ";
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
		</div>
	</div>
	<!-- Load Footer -->
	<?php 

	loadfoot();
	?>
<!-- End Load Footer -->