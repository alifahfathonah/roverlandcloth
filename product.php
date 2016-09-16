<?php
require ('system/depong.php');


// TEMPLATE CONTROL
$ui_register_page = 'product';




// LOAD HEADER
loadAssetsHead('Product');


// Load Menu
LoadMenu();

// Load Search
LoadSearch();
?>

  <script src="assets/admin/paneladmin/js/jquery.min.js"></script>

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
				<h4 class="head"><span class="m_2">Product</span> RVRLND</h4>
				

<div class="row">
            <div class="col-md-12">

                  <div class="row">

                    
<?php 
$querycategories="SELECT *FROM categories";
                $execategories=mysql_query($querycategories);
                while ($datacategories=mysql_fetch_array($execategories)) { ?>
                    <div class="col-md-4">
                      <div class="thumbnail">
                        <div class="image view view-first">
                          <img style="width: 100%; display: block;" src="assets/admin/paneladmin/images/<?php echo $datacategories['foto']?>" alt="image">
                          <div class="mask">
                            <p><?php echo $datacategories['nama_categories']?></p>
                            <div class="tools tools-bottom">
                              
                              <a href="<?php echo $datacategories['nama_file'].'.php';?> "><button class="btn"> Lihat<i class="fa fa-plus"></i></button></a>
                              
                            </div>
                          </div>
                        </div>
                        <div class="cptn">

                          <center><p><?php echo $datacategories['nama_categories']?></p></center>
                        </div>
                      </div>
                    </div>

                 <?php }   ?>
                  </div>

                </div>
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