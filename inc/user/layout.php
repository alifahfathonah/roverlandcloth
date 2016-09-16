<?php
/**
 * Check whenever user is already logged-in or not.
 * @return none
 */


?>


<!-- Eror Login -->
<?php
function loaderorlogin(){
        //kode php ini kita gunakan untuk menampilkan pesan eror
  if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
      echo '<h3><center><font color="red">Username dan Password kosong!</font></center></h3>';
    }
    else if ($_GET['error'] == 2) {
      echo '<h3><center><font color="red">Username belum diisi!</font></center></h3>';
    }
    else if ($_GET['error'] == 3) {
      echo '<h3><center><font color="red">Password belum diisi!</font></center></h3>';
    }
    else if ($_GET['error'] == 4) {
      echo '<h3><center><font color="red">Admin Username atau Password salah!</font></center></h3>';
    }
    else if ($_GET['error'] == 5) {
      echo '<h3><center><font color="red">Member Username atau Password salah!</font></center></h3>';
    }
  }
}
?>

<!-- Start Load Assets Head -->
<?php
function loadAssetsHead($title = 'index'){
  ?>
  <!DOCTYPE html>
  <?php global $ui_register_bg; echo ($ui_register_bg === 'secondary' ) ? '<html lang="en-us" dir="ltr" class="tm-bg-secondary">' : '<html lang="en-us" dir="ltr" class="tm-bg-primary">' ?>

  <head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <title><?php echo $title ?></title>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="./assets/user/css/bootstrap.css" rel='stylesheet' type='text/css' />

    <link href="./assets/user/css/style.css" rel='stylesheet' type='text/css' />
    <link href='./assets/user/css/font.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./assets/user/css/etalage.css">
    <script type="text/javascript" src="./assets/user/js/jquery-1.11.1.min.js"></script>
    <script src="./assets/user/js/responsiveslides.min.js"></script>
    <script src="./assets/user/js/jquery.etalage.min.js"></script>
    <script>
      jQuery(document).ready(function($){

        $('#etalage').etalage({
          thumb_image_width: 300,
          thumb_image_height: 400,
          source_image_width: 900,
          source_image_height: 1200,
          show_hint: true,
          click_callback: function(image_anchor, instance_id){
            alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
          }
        });

      });
    </script>
    <script>
      $(function () {
        $("#slider").responsiveSlides({
          auto: true,
          nav: true,
          speed: 500,
          namespace: "callbacks",
          pager: true,
        });
      });
    </script>
    <script type="text/javascript" src="./assets/user/js/hover_pack.js"></script>
    <script src="./assets/user/js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
                  type: 'default', //Types: default, vertical, accordion           
                  width: 'auto', //auto or any width like 600px
                  fit: true   // 100% fit in a container
                });
      });
    </script> 
    <link rel="icon" href="assets/user/images/roverland.png" type="image/png" sizes="16x16">
  </head>
  <?php 
}



function loadassetsheadupload(){
  ?>
  <head>
    <meta charset="UTF-8"/>
    

    <link href="./assets/user/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="./assets/user/js/jquery.min.js"></script>
    <script src="./assets/user/js/fileinput.min.js" type="text/javascript"></script>
    <script src="./assets/user/js/bootstrap.min.js" type="text/javascript"></script>
    
  </head>
  <?php
}

?>
<!-- End Load Assets Head -->



<!-- Start Load Menu -->
<?php
/**
 * Generate main menu navigation element
 * @param  string $page Page template to match 
 * @param  string $link Menu link
 * @param  string $name Menu name to display
 * @return none 
 */
function generateNavElementMenu( $page, $link, $name){
  global $ui_register_page; 
  echo ( $ui_register_page == $page ) ? '<li class="active"><a href="'.$link.'">'.$name.'</a></li>' . "\n" : '<li><a href="'.$link.'">'.$name.'</a></li>' . "\n";

}

function generateNavElementHead( $page, $link, $name){
  global $ui_register_page; 
  echo ( $ui_register_page == $page ) ? '<li class="uk-active"><a href="'.$link.'">'.$name.'</a></li>' . "\n" : '<li><a href="'.$link.'">'.$name.'</a></li>' . "\n";

}
function generateNavElementcart( $page, $link, $name){
  global $ui_register_page; 
  echo ( $ui_register_page == $page ) ? '<li class="uk-active"><a href="'.$link.'">'.$name.'<img src="assets/user/images/bag.png" alt=""/></a></li>' . "\n" : '<li><a href="'.$link.'"><img src="assets/user/images/bag.png" alt=""/> '.$name.'</a></li>' . "\n";

}
function generateNavElementacount( $page, $link, $name){
  global $ui_register_page; 
  echo ( $ui_register_page == $page ) ? '<li class="uk-active"><a href="'.$link.'">'.$name.'<img src="assets/user/images/user.png" alt=""/></a></li>' . "\n" : '<li><a href="'.$link.'"><img src="assets/user/images/user.png" alt=""/> '.$name.'</a></li>' . "\n";

}

/**
 * Load main menu
 * @return none
 */

function validator(){
  ?>

  <link href="./assets/validator/css/bootstrapValidator.min.css" rel="stylesheet"/>
  <link href="./assets/admin/paneladmin/fonts/css/font-awesome.min.css" rel="stylesheet">
  <script src="./assets/validator/js/bootstrapValidator.min.js" type="text/javascript"></script>
  <?php 
} 

function LoadMenu(){
  ?>
  <body>

    <div class="header">
      <div class="header_top">
        <div class="container">
          <div class="logo">
            <a href="home"><img src="assets/user/images/logo.png" alt=""/></a>
          </div>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
            <li class="dropdown-header">Dropdown header</li>
          </ul>
          <ul class="shopping_grid uk-nav-head">

            <?php
            $sid = session_id();
            $sql = mysql_query("SELECT SUM(qty*harga_discount) as hargaqty, SUM(qty) as totalqty FROM cart_tmp, product, detail_product, ukuran WHERE id_session='$sid' AND cart_tmp.kd_product=product.kd_product AND cart_tmp.id_detail_product=detail_product.id_detail_product AND product.kd_product=detail_product.kd_product AND ukuran.kd_ukuran=detail_product.kd_ukuran ");
            $r=mysql_fetch_array($sql);
            

            if(isset($_SESSION['nm_customer'])) {
             generateNavElementHead('order_history', './order_history', 'Order History');
             ?> <a href="./cart"><li><span class="m_1">Cart</span>&nbsp;&nbsp;
             <?php 
             if ($r['totalqty'] != ""){  
               $total_rp=$r['hargaqty'];
               $total_rp= number_format($total_rp,0,',','.');   
               echo "($r[totalqty]) <span class='harganduwur'>IDR. $total_rp,-</span>" ;

             }?> 

             &nbsp;<img src="assets/user/images/bag.png" alt=""></li></a> <?php 
             
             generateNavElementacount('profile', './profile', $_SESSION['nm_customer']);
             generateNavElementHead('logout', './logout', 'Logout');
           } else { 
            ?> <a href="./cart"><li><span class="m_1">Cart</span>&nbsp;&nbsp;
            <?php 
            if ($r['totalqty'] != ""){  
             $total_rp=$r['hargaqty'];
             $total_rp= number_format($total_rp,0,',','.');   
             echo "($r[totalqty]) <span class='harganduwur'>IDR. $total_rp,-</span>" ;

           }?> 

           &nbsp;<img src="assets/user/images/bag.png" alt=""></li></a> <?php 
           generateNavElementHead('sign_up', './sign_up', 'Sign Up'); 
           generateNavElementHead('sign_in', './sign_in', 'Sign In');  }?>
           

           
           <div class="clearfix"> </div>
         </ul>
         <div class="clearfix"> </div>
       </div>
     </div>
     <div class="h_menu4"><!-- start h_menu4 -->
      <div class="container">
        <a class="toggleMenu" href="#">Menu</a>
        <ul class="nav">
          <?php generateNavElementMenu('home', './home', 'Home') ?>
          <?php generateNavElementMenu('special-offer', './special-offer', 'special offer') ?>
          <?php generateNavElementMenu('new-artikel', './new-artikel', 'New Artikel') ?>
          <?php generateNavElementMenu('product', './product', 'Product') ?>
          <?php generateNavElementMenu('best-seller', './best-seller', 'Best Seller') ?>
          <?php generateNavElementMenu('company', './company', 'Company') ?>
          <?php generateNavElementMenu('contact_us', './contact_us', 'Contact Us') ?>      
        </ul>
        <script type="text/javascript" src="./assets/user/js/nav.js"></script>
        <script type="text/javascript" src="./assets/user/js/bootstrap.min.js"></script>
      </div><!-- end h_menu4 -->
    </div>
  </div>
<!--<nav class="navbar navbar-default navbar-fixed-top">

</nav>-->
<?php
}
?>
<!-- End Load Menu -->

<!-- Start Load SliderBar -->
<?php 
function LoadSliderBar(){
  ?>
  <div class="slider">
    <div class="callbacks_container">
      <ul class="rslides" id="slider">
       <?php require("config.php");
       $sqlslider = "SELECT * from slider";
       $resultslider = mysql_query($sqlslider);
       while($rowslider=mysql_fetch_array($resultslider)){ ?>
       <li><img src="assets/user/images/<?php echo$rowslider['foto']; ?>" class="img-responsive" alt=""/></li>
       <?php 
     } 
     ?>
   </ul>
 </div>

</div>
<?php 
} 
?>
<!-- End Load SliderBar -->




<!-- Start Load SideBar -->
<?php
/**
 * Generate main menu navigation element
 * @param  string $page Page template to match 
 * @param  string $link Menu link
 * @param  string $name Menu name to display
 * @return none 
 */
function generateNavElement( $page, $link, $name){
  global $ui_register_page; 
  echo ( $ui_register_page == $page ) ? '<li class="uk-active"><a href="'.$link.'">'.$name.'</a></li>' . "\n" : '<li><a href="'.$link.'">'.$name.'</a></li>' . "\n";

}
/**
 * Load main menu
 * @return none
 */


function LoadSideBar()
{?>
 <div class="col-md-3 sidebar_box">
   <div class="sidebar">
    <div class="menu_box">
      <h3 class="menu_head">Products Menu</h3>
      <ul class="menu">
        <ul class="uk-nav-side">
          <?php 
          require("inc/config.php");
          $sql1 = "SELECT * from categories ORDER BY nama_categories";
          $result1 = mysql_query($sql1);
          while($row1=mysql_fetch_array($result1)){ ?>
          <?php generateNavElement("$row1[nama_file]", "./$row1[nama_file]", "$row1[nama_categories]") ?>
          <?php } ?> 
        </ul>
      </div>
      <?php 
    }
    ?>
    <!-- End Load SideBar -->




    <!-- Start LoadJs -->
    <?php function LoadJs()
    {
      ?>
      <script type="text/javascript">
        $(function() {
          var menu_ul = $('.menu > li > ul'),
          menu_a  = $('.menu > li > a');
          menu_ul.hide();
          menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
              menu_a.removeClass('active');
              menu_ul.filter(':visible').slideUp('normal');
              $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
              $(this).removeClass('active');
              $(this).next().stop(true,true).slideUp('normal');
            }
          });
          
        });
      </script>
      <?php
    }
    ?>
    <!-- End LoadJs -->




    <!-- Start Load Testimoni -->
    <?php
    function LoadTestimony()
    {
      ?>
    </div>
    <link href="./assets/validator/css/bootstrapValidator.min.css" rel="stylesheet"/>
    <link href="./assets/admin/paneladmin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <script src="./assets/validator/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="./assets/ticker/css_ticker/style.css">  
    
    <script type="text/javascript" src="./assets/ticker/js_ticker/jquery.totemticker.js"></script>
    <script type="text/javascript">
      $(function(){
        $('#vertical-ticker').totemticker({
          row_height  : '100px',
          next    : '#ticker-next',
          previous  : '#ticker-previous',
          stop    : '#stop',
          start   : '#start',
          mousestop : true,
        });
      });
    </script>
    <?php 
    $sqltestimonyindividu="SELECT * FROM testimony, customer WHERE testimony.kd_customer=customer.kd_customer AND customer.kd_customer='$_SESSION[kd_customer]' ";
    $resulttestimonyindividu = mysql_query($sqltestimonyindividu); 
    $datatestimonyindividu = mysql_fetch_array($resulttestimonyindividu)
    ?>
    <div class="twitter">
      <h3>Latest From Testymoni</h3>
      <?php
      $sqltestimony="SELECT * FROM testimony, customer WHERE testimony.kd_customer=customer.kd_customer AND testimony.tampilkan='y' ORDER BY tgl asc, jam asc ";
      $resulttestimony = mysql_query($sqltestimony); ?>
      


      <ul  class="twt1" id="vertical-ticker" style="overflow: hidden;">

        <?php  while($datatestimony = mysql_fetch_array($resulttestimony)){  ?>
        
        <li class="twt1_desc"><i class="twt"></i> <span class="m_1">@<?php echo $datatestimony['nm_testimony']?>  :</span> <?php echo $datatestimony['isi'] ?></span></li>
        <div class="clearfix"> </div>
        <?php } ?>


      </ul>
      <?php validator(); if(!empty($_SESSION['kd_customer'])){ ?>
      <br>
      <center><button class="btn btn-primary btn-normal btn-inline " data-toggle="modal" data-target="#formModal" >Tambah Testimony</button></center>

      <div class="col-lg-12">
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <form role="form" id="formtestimony" enctype="multipart/form-data" method="POST" action="actiontestimony?act=tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="H2">Tambah Testimony</h4>
                </div>
                <div class="modal-body">

                 <div class="form-group">
                  <label>Nama</label>
                  <input name="nama" id="nama" value="<?php echo $datatestimonyindividu['nm_customer']; ?>" class="form-control" required placeholder="Enter text">
                </div>


                <div class="form-group">
                  <label>Text area</label>
                  <textarea class="form-control" name="isi" id="isi" required rows="5"></textarea>
                </div>
                <input type="hidden" name="kd_customer" value="<?php echo $datatestimonyindividu['kd_customer'];?>">

              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>


            </div>
          </div>
        </form>
      </div>

    </div>
    <script>
      $(document).ready(function() {
      	$('#datePicker')
    .datepicker({
      format: 'dd/mm/yyyy'
    })
    .on('changeDate', function(e) {
            // Revalidate the date field
            $('#formtambahkonfirmasi').bootstrapValidator('revalidateField', 'date');
        });
        $('#formtestimony').bootstrapValidator({
          framework: 'bootstrap',
          excluded: ':disabled',
          icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            nama: {
              validators: {
                notEmpty: {
                  message: 'Maaf Anda Belum Mengisi Isi Testimony'
                }
              }
            },
            isi: {
              validators: {
                notEmpty: {
                  message: 'Maaf Anda Belum Mengisi Isi Testimony'
                }
              }
            }
          }
        });
      });
    </script>


    <?php } ?>


  </div>
  
 <?php validator(); if(!empty($_SESSION['kd_customer'])){?>
  <div class="twitter">
   <h3>Testimony Saya</h3>
   <?php  while($datatestimonyindividutotal = mysql_fetch_array($resulttestimonyindividu)){ ?>

   <div class="modal fade" id="modaledittestimony<?php echo $datatestimonyindividutotal['kd_testimony'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form role="form" id="formtestimony" enctype="multipart/form-data" method="POST" action="actiontestimony?act=update">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="H2">Edit Testimony</h4>
          </div>
          <div class="modal-body">

           <div class="form-group">
            <label>Nama</label>
            <input name="nama" id="nama" value="<?php echo $datatestimonyindividutotal['nm_testimony']; ?>" class="form-control" required placeholder="Enter text">
          </div>


          <div class="form-group">
            <label>Text area</label>
            <textarea class="form-control" name="isi" id="isi" required rows="5"><?php echo $datatestimonyindividutotal['isi'];?></textarea>
          </div>
          <input type="hidden" name="kd_customer" value="<?php echo $datatestimonyindividutotal['kd_customer'];?>">
          <input type="hidden" name="kd_testimony" value="<?php echo $datatestimonyindividutotal['kd_testimony'];?>">

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>


      </div>
    </div>
  </form>
</div>

<div class="modal fade" id="modalhapustestimony<?php echo $datatestimonyindividutotal['kd_testimony'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form role="form" id="formtestimony" enctype="multipart/form-data" method="POST" action="actiontestimony?act=hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="H2">Hapus Testimony</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" role="alert" id="removeWarning">
            <span class="glyphicon " aria-hidden="true"></span>
            <span class="sr-only"></span>
            Anda Yakin Akan Menghapus Testimony Ini??????
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input readonly name="nama" id="nama" value="<?php echo $datatestimonyindividutotal['nm_testimony']; ?>" class="form-control" required placeholder="Enter text">
          </div>


          <div class="form-group">
            <label>Text area</label>
            <textarea class="form-control" name="isi" id="isi" required rows="5" readonly="readonly"><?php echo $datatestimonyindividutotal['isi'];?></textarea>
          </div>
          <input type="hidden" name="kd_customer" value="<?php echo $datatestimonyindividutotal['kd_customer'];?>">
          <input type="hidden" name="kd_testimony" value="<?php echo $datatestimonyindividutotal['kd_testimony'];?>">


        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Hapus</button>
        </div>


      </div>
    </div>
  </form>
</div>




<ul class="twt1">   
  <i class="twt"> </i>
  <li class="twt1_desc"><span class="m_1"><?php echo $datatestimonyindividutotal['nm_testimony']?></span> <?php echo $datatestimonyindividutotal['isi'] ?></li>

  
  <div class="clearfix"> </div>
  <center> 

    <button class="btn  btn-xs" data-toggle="modal" data-target="#modaledittestimony<?php echo $datatestimonyindividutotal['kd_testimony'];?>" > <i class="fa fa-pencil"></i></button>
    <button class="btn  btn-xs" data-toggle="modal" data-target="#modalhapustestimony<?php echo $datatestimonyindividutotal['kd_testimony'];?>" > <i class="fa fa-trash-o"></i></button>
  </center>
</ul>

<?php } ?>

</div>
<?php }  ?>

<div class="clients">
  <h3>Selamat Berbelanja :)</h3>
  <h4>Pantau Terus Artikel Terbaru Kami, Kami Selalu Mengedepankan Qualty , Precious, Dan Limited. Setiap Bulan Kami Akan Memproduksi Product-Product Yang Baru Dan Fresh, Dukung Selalu Clothing Lokal Yogyakarta </h4>
  <ul class="user">
    <i class="user_icon"></i>
    <li class="user_desc"><a href="#"><p>Roverland Cloth, Company </p></a></li>
    <div class="clearfix"> </div>
  </ul>
</div>
</div> 

<?php
}

?>
<!-- End Load Testimoni -->




<!-- Start LoadSearch -->
<?php 
function LoadSearch(){
  ?>
  <div class="column_center">
    <div class="container">
      <div class="search">
        <div class="stay">Search Product</div>
        <div class="stay_right">
        <form id="formcari" method="POST" action="cari" class="form-horizontal form-label-left" enctype="multipart/form-data">
          <input type="text" name="txtKeyword" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
          <input type="submit" name="btnCari" value="">
          </form>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <?php
}
?>
<!-- End LoadSearch -->




<!-- Load Footer Start -->
<?php 
function loadfoot(){
  ?>
  <div class="footer_bg">
  </div>
  <div class="footer">
    <div class="container">
      <div class="col-md-3 f_grid1">
        <h3>About</h3>
        <a href="home"><img src="assets/user/images/logo.png" alt=""/></a>


        <p>Limited , Precious & Quality <br> Roverland Cloth YK || INA <br> Estabilished 2013 <br>Roverland, Company</p>
      
      </div>
      <div class="col-md-3 f_grid1 f_grid2">
        <h3>Follow Us</h3>
        <ul class="social">
          <li><a href="wwww.facebook.com/Roverlandcloth"> <i class="fb"> </i><p class="m_3">Facebook</p><div class="clearfix"> </div></a></li>
          <li><a href="www.twitter.com/Roverlandcloth"><i class="tw"> </i><p class="m_3">Twittter</p><div class="clearfix"> </div></a></li>
          <li><a href="#"><i class="google"> </i><p class="m_3">Google</p><div class="clearfix"> </div></a></li>
          <li><a href="www.instagram.com/Roverlandcloth"><i class="instagram"> </i><p class="m_3">Instagram</p><div class="clearfix"> </div></a></li>
        </ul>
      </div>
      <div class="col-md-6 f_grid3">
        <h3>Contact Info</h3>
        <ul class="list">
          <li><p>Phone : +6281804003381</p></li>
          <li><p>Pin BBM : 7E9BF187 </p></li>
          <li><p>Email : <a href="Official@RoverlandCloth.com "> Official@RoverlandCloth.com</a></p></li>
        </ul>
        <ul class="list1">
         <li><p> <a href="cara_pembayaran"> Cara Pembayaran</a></p></li>
         <li><p> <a href="cara_pembelian"> Cara Pembelian</a></p></li>
         
       </ul>
       <div class="clearfix"> </div>
     </div>
   </div>
 </div>
 <div class="footer_bottom">
  <div class="container">
    <div class="cssmenu">
      <ul>
        <li class="active"><a href="privacy_policy">Privacy Policy</a></li> .
        <li><a href="terms_of_service">Terms of Service</a></li> .
        
        <li><a href="contact_us">Contact Us</a></li> .
        
      </ul>
    </div>
    <div class="copy">
      <p>&copy;  2015 Roverland Cloth <a href="#" target="_blank">By Fajarnur24</a></p>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
</body>
</html>   
<?php
}

function DataHeadTabel(){
  ?>
  

  <link href="./assets/admin/paneladmin/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="./assets/admin/paneladmin/css/animate.min.css" rel="stylesheet">
  <link href="./assets/admin/paneladmin/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="./assets/admin/paneladmin/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  
  <link href="./assets/admin/paneladmin/css/icheck/flat/green.css" rel="stylesheet">
  <link href="./assets/admin/paneladmin/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="./assets/admin/paneladmin/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="./assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./assets/admin/paneladmin/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./assets/admin/paneladmin/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="./assets/images/roverland.png" type="image/png" sizes="16x16">

  <script src="./assets/admin/paneladmin/js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="./assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

          <?php 
        } 
#####################################################################################################################

        function JsDataTabel(){
          ?>
          <script src="./assets/admin/paneladmin/js/bootstrap.min.js"></script>

          <!-- bootstrap progress js -->
          <script src="./assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
          <!-- icheck -->
          <script src="./assets/admin/paneladmin/js/icheck/icheck.min.js"></script>

          <script src="./assets/admin/paneladmin/js/custom.js"></script>

          <!-- Datatables -->
        <!-- <script src="./assets/admin/paneladmin/js/datatables/js/jquery.dataTables.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->

        <script src="./assets/admin/paneladmin/js/datatables/jquery.dataTables.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/dataTables.bootstrap.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/dataTables.buttons.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/jszip.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/pdfmake.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/vfs_fonts.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/buttons.html5.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/buttons.print.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/dataTables.responsive.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="./assets/admin/paneladmin/js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="./assets/admin/paneladmin/js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
            "use strict";
            0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [{
                extend: "copy",
                className: "btn-sm"
              }, {
                extend: "csv",
                className: "btn-sm"
              }, {
                extend: "excel",
                className: "btn-sm"
              }, {
                extend: "pdf",
                className: "btn-sm"
              }, {
                extend: "print",
                className: "btn-sm"
              }],
              responsive: !0
            })
          },
          TableManageButtons = function() {
            "use strict";
            return {
              init: function() {
                handleDataTableButtons()
              }
            }
          }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "./assets/admin/paneladmin/js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
      </body>

      </html>

      <?php 



    }

    function datepicker(){ ?>
    <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <link href="assets/datepicker/css/datepicker3.min.css" rel="stylesheet">
    <link href="assets/datepicker/css/datepicker.min.css" rel="stylesheet">

    <?php }


    ?> 