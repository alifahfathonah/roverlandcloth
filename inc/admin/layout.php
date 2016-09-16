<?php
#-------------------------------------------------------------------------------------------------------------------#
#                                                     Information                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                               Created By    : Fajar Nurrohmat                                     #
#                                               Email         : Fajarnur24@gmail.com                                #
#                                               Name File     : layout.php                                          #
#                                               Release Date  :                                                     #
#                                               Created       : 20/04/16 02.23                                      #
#                                               Last Modified : 22/04/16 01.08                                      #
#                                                                                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                                SIK BERKAITAN KARO LAYOUT                                          #
#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Head Sampai Body Di Halaman Welcome
#-------------------------------------------------------------------------------------------------------------------#
function kelolatanggal($vardate,$added)
{
$data = explode("-", $vardate);
$date = new DateTime();
$date->setDate($data[0], $data[1], $data[2]);
$date->modify("".$added."");
$day= $date->format("Y-m-d");
return $day;
}

function IndonesiaTgl($tanggal){
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
  $awal="$tgl-$bln-$thn";
  return $awal;
}


function BagianHeadWelcome(){
    ?>
<html>
    <head>
        <title>Administrator Roverland Cloth</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="../assets/admin/welcome/js/skel.min.js"></script>
        <script src="../assets/admin/welcome/js/init.js"></script>

            <link rel="stylesheet" href="../assets/admin/welcome/css/skel.css" />
            <link rel="stylesheet" href="../assets/admin/welcome/css/style.css" />
            <link rel="stylesheet" href="../assets/admin/welcome/css/style-wide.css" />
            <link rel="stylesheet" href="../assets/admin/welcome/css/style-noscript.css" />
            <link rel="icon" href="../assets/images/roverland.png" type="image/png" sizes="16x16">
        <!--[if lte IE 9]><link rel="stylesheet" href="../assets/admin/paneladmin/css/ie/v9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="../assets/admin/paneladmin/css/ie/v8.css" /><![endif]-->
    </head>
    <body class="loading">
        <div id="wrapper">
            <div id="bg"></div>
            <div id="overlay"></div>
            <div id="main">
<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Footer Di Halaman Welcome
#-------------------------------------------------------------------------------------------------------------------#
function BagianfooterWelcome(){
    ?>
                    <footer id="footer">
                        <span class="copyright">&copy; Design By: <a href="#">Fajarnur24</a>.</span>
                    </footer>
                
            </div>
        </div>
    </body>
</html>
<?php 
} 
#####################################################################################################################

#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Head Di Halaman Login Admin
#-------------------------------------------------------------------------------------------------------------------#

function BukaHeadLogin(){
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login Administrator</title>
<link rel="stylesheet" href="../assets/admin/login/css_login/style.default.css" type="text/css" />
<link rel="icon" href="../assets/images/roverland.png" type="image/png" sizes="16x16">

<script type="text/javascript" src="../assets/admin/login/js_login/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../assets/admin/login/js_login/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="../assets/admin/login/js_login/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="../assets/admin/login/js_login/modernizr.min.js"></script>
<script type="text/javascript" src="../assets/admin/login/js_login/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/admin/login/js_login/jquery.cookie.js"></script>
<script type="text/javascript" src="../assets/admin/login/js_login/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
</head>
<body class="loginpage" style="background:url(../assets/admin/login/img/bg.png)">
<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="../assets/admin/login/img/logo.png" alt="" /></div>
<?php
}
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Footer Di Halaman Login Admin
#-------------------------------------------------------------------------------------------------------------------#
function BagianfooterAdmin(){
    ?>
</div>
</div>

<div class="loginfooter">
    <p>&copy; 2016. Roverland.co. </p>
</div>
</body>
</html>
<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Head Di Panel Admin
#-------------------------------------------------------------------------------------------------------------------#
function BagianHeadPanelAdmin(){
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Roverland </title>

  <!-- Bootstrap core CSS -->

  <link href="../assets/admin/paneladmin/css/bootstrap.min.css" rel="stylesheet">

  <link href="../assets/admin/paneladmin/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/admin/paneladmin/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link rel="stylesheet" href="../assets/admin/paneladmin/css/bootstrap-fileupload.min.css" />
  
  <link href="../assets/admin/paneladmin/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/admin/paneladmin/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="../assets/admin/paneladmin/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="../assets/admin/paneladmin/css/floatexamples.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="../assets/images/roverland.png" type="image/png" sizes="16x16">
 <script src="../assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
 <script type="text/javascript" src="../assets/admin/paneladmin/js/wizard/jquery.smartWizard.js"></script>
  <script src="../assets/admin/paneladmin/js/jquery.min.js"></script>
  <script src="../assets/admin/paneladmin/js/nprogress.js"></script>
  <script src="../assets/admin/paneladmin/js/bootstrap-fileupload.js"></script>

</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Sidebar Menu Di Panel Admin
#-------------------------------------------------------------------------------------------------------------------#
function BagianSideBarPanelAdmin(){
          $sql1 = "SELECT * from admin where username = '{$_SESSION['username']}'";
          $result1 = mysql_query($sql1);
          $row1=mysql_fetch_array($result1);
    ?>

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="dashboard" class="site_title"><i class="fa fa-paw"></i> <span>Roverland</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <?php echo"<img src='../assets/admin/paneladmin/profile-admin/$row1[foto] ' alt='foto' class='img-circle profile_img'>";?>
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo "$row1[nama_lengkap]";?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3><?php echo "$row1[username]";?></h3>

              <ul class="nav side-menu">
                <li><a href="dashboard"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                
                <li><a><i class="fa fa-group"></i> Manage Customer <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="customer">Customer</a>
                    </li>
                    <li><a href="testimony">Testimony</a>
                    </li>
                  </ul>
                </li>
                </li>
                <li><a><i class="fa fa-th-list"></i> Manage Product <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                    <li><a href="product">Product</a>
                    </li>
                    <li><a href="categories">Categories</a>
                    </li>
                    <li><a href="ukuran">Ukuran</a>
                    </li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Manage Page <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    
                    <li><a href="slider">Home</a>
                    </li>
                    
                    <li><a href="cara_pembayaran">Cara Pembayaran</a>
                    </li>
                    <li><a href="cara_pembelian">Cara Pembelian</a>
                    <li><a href="company">Company</a>
                    </li>
                    </li>
                     <li><a href="contact_us">Contact Us</a>
                    </li>
                    <li><a href="privacy_policy">Privacy Policy</a>
                    </li>
                    <li><a href="terms_of_service">Terms Of Services</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-shopping-cart"></i> Manage Transaction <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="order_masuk">Order Masuk</a>
                    </li>
                    <li><a href="konfirmasi_pembayaran">KonfirmasiPembayaran</a>
                    </li>
                    <li><a href="bank">Bank</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-truck"></i> Manage Delivery <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="provinsi">Provinsi</a>
                    </li>
                    <li><a href="kabupaten">Kabupaten</a>
                    </li>
                    <li><a href="kecamatan">Kecamatan</a>
                    </li>
                    <li><a href="kelurahan">Kelurahan</a>
                    </li>
                    <li><a href="ongkos_kirim">Ongkos Kirim </a>
                    </li>
                    <li><a href="data_pengiriman">Data pengiriman Barang</a>
                    </li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-files-o"></i> Manage Document <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="data_penjualan">Data Penjualan</a>
                    </li>
                    
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a href="logout" data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Top Navigation PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#
function BagianTopNavi(){
    $sql1 = "SELECT * from admin where username = '{$_SESSION['username']}'";
          $result1 = mysql_query($sql1);
          $row1=mysql_fetch_array($result1);
    ?>
      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <?php echo "<img src='../assets/admin/paneladmin/profile-admin/$row1[foto]' alt=''>$row1[nama_lengkap]";?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="profile_admin">  Profile</a>
                  </li>
                  <li><a href="acount_admin">  Acount</a>
                  </li>
                  <li><a href="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->
<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Script Js PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#
function ScriptJsPanel(){
    ?>
  <script src="../assets/admin/paneladmin/js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="../assets/admin/paneladmin/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="../assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="../assets/admin/paneladmin/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="../assets/admin/paneladmin/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="../assets/admin/paneladmin/js/chartjs/chart.min.js"></script>

  <script src="../assets/admin/paneladmin/js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="../assets/admin/paneladmin/js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/date.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/flot/jquery.flot.resize.js"></script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="../assets/admin/paneladmin/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="../assets/admin/paneladmin/js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="../assets/admin/paneladmin/js/pace/pace.min.js"></script>
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  <script src="../assets/admin/paneladmin/js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- Doughnut Chart -->
  <script>
    $('document').ready(function() {
      var options = {
        legend: false,
        responsive: false
      };

      new Chart(document.getElementById("canvas1"), {
        type: 'doughnut',
        tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        data: {
          labels: [
            "Symbian",
            "Blackberry",
            "Other",
            "Android",
            "IOS"
          ],
          datasets: [{
            data: [15, 20, 30, 10, 30],
            backgroundColor: [
              "#BDC3C7",
              "#9B59B6",
              "#E74C3C",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#CFD4D8",
              "#B370CF",
              "#E95E4F",
              "#36CAAB",
              "#49A9EA"
            ]
          }]
        },
        options: options
      });
    });
  </script>
  <!-- /Doughnut Chart -->
  
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>


<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Footer PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#
function BagianFooterPanelAdmin(){
    ?>
           <!-- footer content -->
        <footer>
          <div class="pull-right">
           Roverland Cloth Administrator</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
   <!-- bootstrap progress js -->
  <script src="../assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  

   <!-- form wizard -->
  <script type="text/javascript" src="../assets/admin/paneladmin/js/wizard/jquery.smartWizard.js"></script>
  <!-- pace -->
  <script src="../assets/admin/paneladmin/js/pace/pace.min.js"></script>
<?php 
} 
#####################################################################################################################

#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari JSTABELSHORTER PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#
function JsDataTabel(){
    ?>
        <script src="../assets/admin/paneladmin/js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="../assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="../assets/admin/paneladmin/js/icheck/icheck.min.js"></script>

        <script src="../assets/admin/paneladmin/js/custom.js"></script>

                 <!-- Datatables -->
        <!-- <script src="../assets/admin/paneladmin/js/datatables/js/jquery.dataTables.js"></script>
  <script src="../assets/admin/paneladmin/js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->

        <script src="../assets/admin/paneladmin/js/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.bootstrap.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/jszip.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/pdfmake.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/vfs_fonts.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.html5.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.print.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="../assets/admin/paneladmin/js/pace/pace.min.js"></script>
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
              ajax: "../assets/admin/paneladmin/js/datatables/json/scroller-demo.json",
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


function NgisoraneJsDataTabel(){
    ?>
 

        <!-- bootstrap progress js -->
        <script src="../assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="../assets/admin/paneladmin/js/icheck/icheck.min.js"></script>

        <script src="../assets/admin/paneladmin/js/custom.js"></script>
        


                 <!-- Datatables -->
        <!-- <script src="../assets/admin/paneladmin/js/datatables/js/jquery.dataTables.js"></script>
  <script src="../assets/admin/paneladmin/js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="../assets/admin/paneladmin/js/validator/validator.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.bootstrap.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/jszip.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/pdfmake.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/vfs_fonts.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.html5.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.print.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="../assets/admin/paneladmin/js/pace/pace.min.js"></script>
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
              ajax: "../assets/admin/paneladmin/js/datatables/json/scroller-demo.json",
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
#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari JSTABELSHORTER PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#
function footerJsDataTabel(){
    ?>
    <script src="../assets/admin/paneladmin/js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="../assets/admin/paneladmin/js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="../assets/admin/paneladmin/js/icheck/icheck.min.js"></script>

        <script src="../assets/admin/paneladmin/js/custom.js"></script>


        <!-- Datatables -->
        <!-- <script src="../assets/admin/paneladmin/js/datatables/js/jquery.dataTables.js"></script>
  <script src="../assets/admin/paneladmin/js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
         <script type="text/javascript" language="javascript" src="../assets/admin/paneladmin/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/admin/paneladmin/media/js/dataTables.responsive.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/admin/paneladmin/media/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/admin/paneladmin/media/js/common.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.bootstrap.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/jszip.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/pdfmake.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/vfs_fonts.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.html5.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/buttons.print.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.keyTable.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.js"></script>
        <script src="../assets/admin/paneladmin/js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="../assets/admin/paneladmin/js/pace/pace.min.js"></script>
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
              ajax: "../assets/admin/paneladmin/js/datatables/json/scroller-demo.json",
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
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari JSTABELSHORTER PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#

#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Meta Tabel PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#
function DataMetaTabel(){
    ?>
      <!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
# Bagian Dari Head Tabel PanelAdmin
#-------------------------------------------------------------------------------------------------------------------#
function DataHeadTabel(){
    ?>
     <link href="../assets/admin/paneladmin/css/bootstrap.min.css" rel="stylesheet">

  <link href="../assets/admin/paneladmin/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/admin/paneladmin/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="../assets/admin/paneladmin/css/custom.css" rel="stylesheet">
  <link href="../assets/admin/paneladmin/css/icheck/flat/green.css" rel="stylesheet">
 
   
  <link href="../assets/admin/paneladmin/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="../assets/images/roverland.png" type="image/png" sizes="16x16">

  <script src="../assets/admin/paneladmin/js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
<?php 
} 
#####################################################################################################################


#-------------------------------------------------------------------------------------------------------------------#
function headfixdatatabel(){
    ?>
<link rel="stylesheet" href="../assets/fileupload/css/bootstrap-fileupload.min.css" />
    <script src="../assets/fileupload/js/jquery-2.0.3.min.js"></script>
    <script src="../assets/fileupload/js/bootstrap-fileupload.js"></script>
     <script type="text/javascript" language="javascript" src="../assets/admin/paneladmin/media/js/jquery.js"></script>
    
    <!-- BOOTSTRAP -->
    <!-- Latest compiled and minified CSS -->
    <link href="../assets/admin/paneladmin/css/bootstrap.min.css" rel="stylesheet">

  <link href="../assets/admin/paneladmin/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/admin/paneladmin/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="../assets/admin/paneladmin/css/custom.css" rel="stylesheet">
  <link href="../assets/admin/paneladmin/css/icheck/flat/green.css" rel="stylesheet">
    
    <!-- Latest compiled and minified JavaScript -->

    <script src="../assets/admin/paneladmin/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../assets/admin/paneladmin/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/paneladmin/media/css/dataTables.responsive.css">
   
    <link href="../assets/admin/paneladmin/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/admin/paneladmin/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="../assets/images/roverland.png" type="image/png" sizes="16x16">

  
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
<?php 
} 
#####################################################################################################################




function validator(){
    ?>

     <link href="../assets/validator/css/bootstrapValidator.min.css" rel="stylesheet"/>
<script src="../assets/validator/js/bootstrapValidator.min.js" type="text/javascript"></script>
<?php 
} 
#####################################################################################################################

function validasiavailable(){
    ?>

   <link rel="stylesheet" href="../assets/validasiavailabe/style.css" type="text/css" />


<?php
} 
#####################################################################################################################
function buatKode($tabel, $inisial){
  $struktur = mysql_query("SELECT * FROM $tabel");
  $field    = mysql_field_name($struktur,0);
  $panjang  = mysql_field_len($struktur,0);
  
  // membaca panjang kolom
  $hasil    = mysql_fetch_field($struktur,0);
  //$panjang  = $hasil->max_length; 
  

  $qry  = mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
  $row  = mysql_fetch_array($qry); 
  if ($row[0]=="") {
    $angka=0;
  }
  else {
    $angka    = substr($row[0], strlen($inisial));
  }
  
  $angka++;
  $angka  =strval($angka); 
  $tmp  ="";
  for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
    $tmp=$tmp."0";  
  }
  return $inisial.$tmp.$angka;
}

###################################################################

function randomcode($len="10"){
  global $pass;
  global $lchar;

$code= NULL;
for($i=0; $i<$len; $i++){
    $char=chr(rand(48,122));
    while (!ereg("[a-zA-Z0-9]", $char)) {
      if($char == $lchar) {continue;}
      $char =chr(rand(48,90));
    }
    $pass .=$char;
    $lchar=$char;
  }
  return $pass;
}


function datepicker(){ ?>
    <script src="../assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <link href="../assets/datepicker/css/datepicker3.min.css" rel="stylesheet">
    <link href="../assets/datepicker/css/datepicker.min.css" rel="stylesheet">

    <?php }

    function ubahformatTgl($tanggal) {
    $pisah    = explode('/',$tanggal);
    $urutan   = array($pisah[2],$pisah[1],$pisah[0]);
    $satukan  = implode('-',$urutan);
    return $satukan;
  }

?>

