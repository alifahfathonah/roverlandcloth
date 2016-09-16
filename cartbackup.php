<?php
require ('system/depong.php');

//uwesmlebu();
// TEMPLATE CONTROL
$ui_register_page = 'detail.product';

// LOAD HEADER
loadAssetsHead('Detail Product');
DataHeadTabel();

// Load Menu
LoadMenu();
validator();

$kd_product=$_GET['id'];

$sql="SELECT * FROM product where kd_product='$kd_product'";
$s = mysql_query($sql);
$data= mysql_fetch_array($s);

$harga_discount=$data['harga_discount'];
$harga_discount= number_format($harga_discount,0,',','.');

$harga=$data['harga'];
$harga= number_format($harga,0,',','.');



LoadSearch();
?>


<div class="main">
	<div class="content_top">
		<div class="container">
<div class="col-lg-12">
			<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th><center>No</center> </th>
									<th><center>Nama Bank</center> </th>
									<th><center>No Rekening</center> </th>
									<th><center>Nama Pemilik</center> </th>
									<th><center>Gamabar</center> </th>
									<th><center>Option</center> </th>
								</tr>
							</thead>
							<div class="col-lg-12">
								<?php 
#-------------------------------------------------------------------------------------------------------------------#
#                                                     Query                                                   
#-------------------------------------------------------------------------------------------------------------------#                          

								$no=0;
								$querybank="SELECT *FROM bank";
								$exebank=mysql_query($querybank);
								while ($databank=mysql_fetch_array($exebank)) { 
									$no++; ?>
									<tr>
		<td><?php echo $no?></td>
		<td><?php echo $databank['nama_bank']?></td>
		<td><?php echo $databank['no_rekening']?></td>
		<td><?php echo $databank['pemilik']?></td>
		<td><center><a  href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="../assets/images/bank/<?php echo $databank['foto']?>" data-target="#image-gallery<?php echo $databank['kd_bank']; ?>">
			<img class="img-responsive img-circle" width="100px" height="100x" src="../assets/images/bank/<?php echo $databank['foto']?>" alt="Short alt text">
		</a></center></td>
		<td><CENTER> 
			<a href="bank.edit?id=<?php echo $databank['kd_bank'];?>"><button class="btn btn-success btn-xs" > <i class="fa fa-pencil"></i></button></a>
			<button data-toggle="modal" data-target="#hapusbank<?php echo $databank['kd_bank']; ?>" href="#hapusbank<?php echo $databank['kd_bank']; ?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></button>
		</CENTER>
	</td>
</tr>
 



<?php } ?>


</tbody>
</table>

               <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pembayaran
                        </div>
                        <div class="panel-body">
                           
                                <table class="table table-hover">
                                   
                                    <tbody>
                                        <tr >
                                            <td>Total</td>
                                            <td align="right">:</td>
                                            <td align="right" class="danger">20000</td>
                                           
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">  <a href="?open=Barang2" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></div>
                <div class="col-lg-10"><a href="?open=Transaksi-Proses" class="btn btn-large pull-right">Checkout <i class="icon-arrow-right"></i></a></div>

                </div>
                <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Contacts Design</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">

                  <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                      <ul class="pagination pagination-split">
                        <li><a href="#">A</a>
                        </li>
                        <li><a href="#">B</a>
                        </li>
                        <li><a href="#">C</a>
                        </li>
                        <li><a href="#">D</a>
                        </li>
                        <li><a href="#">E</a>
                        </li>
                        <li>...</li>
                        <li><a href="#">W</a>
                        </li>
                        <li><a href="#">X</a>
                        </li>
                        <li><a href="#">Y</a>
                        </li>
                        <li><a href="#">Z</a>
                        </li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/user.png" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
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
<div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>Digital Strategist</i></h4>
                          <div class="left col-xs-7">
                            <h2>Nicole Pearson</h2>
                            <p><strong>About: </strong> Web Designer / UI. </p>
                            <ul class="list-unstyled">
                              <li><i class="fa fa-phone"></i> Address: </li>
                              <li><i class="fa fa-phone"></i> Address: </li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">
                            <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <p class="ratings">
                              <a>4.0</a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            </p>
                          </div>
                          <div class="col-xs-12 col-sm-6 emphasis">
                            <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                            </i> <i class="fa fa-comments-o"></i> </button>
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-user">
                                                            </i> View Profile </button>
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
JsDataTabel();


loadfoot();
?>
<!-- End Load Footer -->