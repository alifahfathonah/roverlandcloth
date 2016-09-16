<?php
require ('system/depong.php');
DataHeadTabel();
// TEMPLATE CONTROL
$ui_register_page = 'cart';

// LOAD HEADER
loadAssetsHead('Cart');


// Load Menu
LoadMenu();
?>
<script>
	function harusangka(jumlah){
		var karakter = (jumlah.which) ? jumlah.which : event.keyCode
		if (karakter > 31 && (karakter < 48 || karakter > 57))
			return false;

		return true;
	}
</script>
<div class="main"><center><h4 class="head"><span class="m_2">Shoping</span> Cart</h4></center>
	<div class="content_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Troli Belanja Saya
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped  table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th class="centre" colspan="2"><centre>Product</centre></th>
											<th>Harga @ Product</th>
											<th>QTY</th>
											<th>Total Harga Product</th>
											<th>Option</th>
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
	  <form id="formcart" method="POST" action="./actioncart?act=update" class="form-horizontal form-label-left" enctype="multipart/form-data">
         <?php 							$no=1; $hargatotalproduct=0;
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
												<td align="center">  <?php
				 echo "<input type=text name='jml[$no]' value=$data[qty] size=3 onchange=\"this.form.submit()\" onkeypress=\"return harusangka(event)\"><br>";
				 echo "<input type=hidden name=id[$no] value=$data[id_cart_tmp]>";
				?></td>							
											<td align="center"><p class="head"><?php echo 'IDR. '.$hargatotalproduct?>,-</p></td>
												<td align="center"><a href="actioncart?act=hapus&&id=<?php echo $data['id_cart_tmp']; ?>" class="btn" ><i class="fa fa-trash"></i></a></td>
											</tr>

											<?php $no++; }?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>


				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Detail Order
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<tbody>
											<tr >
												<td align="left" ><p class="head"><span class="keteranganharga">TOTAL HARGA</span></p></td>
												<td align="right">:</td>
												<td align="right" class="danger"><p class="head"><span class="harga"><?php echo 'IDR. '.$hargatotal; ?>,-</span></p></td>

											</tr>
											<tr >
												<td><a href="product" class="btn btn-large pull-left"><i class="icon-arrow-left"></i> Continue Shopping </a></td>
												<td align="right"></td>
												<td ><a href="checkout" class="btn btn-large pull-right"><i class="icon-arrow-right"></i> CheckOut </a></td>

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
	<?php
  }
?>   
	<!-- Load Footer -->
	<?php 
	JsDataTabel();
	loadfoot();
	?>
<!-- End Load Footer -->