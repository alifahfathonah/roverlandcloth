<?php
#-------------------------------------------------------------------------------------------------------------------#
#                                                     Information                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                               Created By    : Fajar Nurrohmat                                     #
#                                               Email         : Fajarnur24@gmail.com                                #
#                                               Name File     : categories.php                                        #
#                                               Release Date  :                                                     #
#                                               Created       : 20/04/16 02.23                                      #
#                                               Last Modified : 22/04/16 01.08                                      #
#                                                                                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                                SIK BERKAITAN KARO LOGIN                                           #
#-------------------------------------------------------------------------------------------------------------------#

# Include Dari System
require ('../system/jenglot.php');
require ('../inc/admin/script_serverside.php');

session_start();
hakAksesKakakz();

cekTingkatUser(array(1));
# Sudah Login Dan Menyimpan Session 

DataMetaTabel();  ?>

<title>Data Kategori</title>

<?php 
DataHeadTabel();

validator();

BagianSideBarPanelAdmin();

BagianTopNavi();

?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>
          Data Kategori
          <small>
            Manage Your Data Kategori
          </small>
        </h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Master Data <small>Kategori</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <p class="text-muted font-13 m-b-30">
              Berikut ini merupakan data kategori yang ada di roverland cloth
            </p>
            <a href="categories.tambah"> <button type="button" class="btn btn-info" data-toggle="modal" ><i class="fa fa-plus-square" ></i> Tambah</button></a><p></p>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th><center>No</center> </th>
                  <th><center>Kode Kategori</center> </th>
                  <th><center>Nama Kategori</center> </th>
                  <th><center>Image</center> </th>
                  <th><center>Option</center> </th>
                </tr>
              </thead>
              <div class="col-lg-12">
                <?php 
#-------------------------------------------------------------------------------------------------------------------#
#                                                     Query                                                   
#-------------------------------------------------------------------------------------------------------------------#                          

                $no=0;
                $querycategories="SELECT *FROM categories";
                $execategories=mysql_query($querycategories);
                while ($datacategories=mysql_fetch_array($execategories)) { 
                  $no++;
#-------------------------------------------------------------------------------------------------------------------#?>


<?php#-------------------------------------------------------------------------------------------------------------------#
#                                                     Hapus Data categories                                                  
#-------------------------------------------------------------------------------------------------------------------#
?> 

<div class="modal" id="hapuscategories<?php echo $datacategories['kd_categories']; ?>" tabindex="-1"    role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="H2">Hapus Data Kategori</h4>
      </div>
      <div class="modal-body">
       <div class="alert alert-danger" role="alert" id="removeWarning">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Anda yakin ingin menghapus data kategori <?php echo "$datacategories[nama_categories]";?> ?
      </div>
      <form class="form-horizontal" id="formcategories">
       <form role="form" method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <label>Nama categories</label>
          <input class="form-control" name="nama_categories" value="<?php echo "$datacategories[nama_categories]"; ?>" disable readonly required  />
        </div>
      </div>
      <div class="modal-footer">                                            
        <a href="categories.hapus?id=<?php echo $datacategories['kd_categories'];?>&file=<?php echo $datacategories['foto'];?>"> <button type="button" class="btn btn-default"></i> Yes</button></a>
        <button type="button" data-toggle="modal" data-dismiss="modal" class="btn btn-default"></i> No</button>
      </div>
    </form>
  </div>
</div>
</div>
<div class="modal fade" id="image-gallery<?php echo $datacategories['kd_categories']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="background: none">
    <div style="background: none">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="image-gallery-title"></h4>
        <img id="image-gallery-image" class="img-responsive img-rounded" src="../assets/admin/paneladmin/images/<?php echo $datacategories['foto']?>">
      </div>   
    </div>
  </div>
</div>
<?php#-------------------------------------------------------------------------------------------------------------------# ?>

<tr>
  <td><?php echo $no?></td>
  <td><?php echo $datacategories['kd_categories']?></td>
  <td><?php echo $datacategories['nama_categories']?></td>
  <td><center><a  href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="../assets/admin/paneladmin/images/<?php echo $datacategories['foto']?>" data-target="#image-gallery<?php echo $datacategories['kd_categories']; ?>">
                <img class="img-responsive img-circle" width="100px" height="100x" src="../assets/admin/paneladmin/images/<?php echo $datacategories['foto']?>" alt="Short alt text">
            </a></center></td>
  <td><CENTER> 
    <a href="categories.edit?id=<?php echo $datacategories['kd_categories'];?>"><button class="btn btn-success btn-xs" > <i class="fa fa-pencil"></i></button></a>
    <button data-toggle="modal" data-target="#hapuscategories<?php echo $datacategories['kd_categories']; ?>" href="#hapuscategories<?php echo $datacategories['kd_categories']; ?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></button>
  </CENTER>
</td>
</tr>


<?php } ?>

</tbody>
</table>
<?php
JsDataTabel();
?>