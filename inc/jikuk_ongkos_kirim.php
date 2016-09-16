
<?php
  $q = $_GET["q"];
  include("../inc/config.php");
  
  $sql = "SELECT * FROM provinsi, kabupaten, kecamatan, ongkos_kirim WHERE provinsi.id_prov=kabupaten.id_prov AND kabupaten.id_kab=kecamatan.id_kab AND kecamatan.id_kec=ongkos_kirim.id_kec AND ongkos_kirim.id_kec = '".$q."'";
  $result = mysql_query($sql);
  
  $sql2 = "SELECT * FROM kecamatan WHERE id_kec = '".$q."'";
  $result2 = mysql_query($sql2);
  $row2 = mysql_fetch_assoc($result2);
    
  $row = mysql_fetch_assoc($result);

  if ($row>0) {
            $reg=$row['reg'];
            $reg= number_format($reg,0,',','.');
            $oke=$row['oke'];
            $oke= number_format($oke,0,',','.');
?>
<div class="alert alert-danger" role="alert" >
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Data ongkos kirim yang akan anda tambahkan pada kecamatan <?php echo "$row[nama_kec]";?> sudah tersedia/sudah ada. anda bisa menghapus atau mengedit data ongkos tersebut.
     <br>
     </br>
     </div>
<div class="alert abang" role="alert" >
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th><center>Provinsi</center> </th>
                  <th><center>Kabupaten</center> </th>
                  <th><center>Kecamatan</center> </th>
                  <th><center>Harga Paket Reguler</center> </th>
                  <th><center>Estimasi Paket Reguler</center> </th>
                  <th><center>Harga Paket Oke</center> </th>
                  <th><center>Estimasi Paket Oke</center> </th>
                  <th><center>Action</center> </th>
                </tr>
              </thead>
              <div class="col-lg-12">
                <tr>
                  <td><center><?php echo" $row[nama_prov] "; ?></center></td>
                  <td><center><?php echo" $row[nama_kab] "; ?></center></td>
                  <td><center><?php echo" $row[nama_kec] "; ?></center></td>
                  <td><center><?php echo"Rp. $reg,-"; ?></center></td>
                  <td><center><?php echo" $row[estimasi_reg] Hari"; ?></center></td>
                  <td><center><?php echo"Rp. $oke,-"; ?></td>
                  <td><center><?php echo" $row[estimasi_oke] Hari"; ?></center></td>
                  <td><CENTER> 
                    <a href="../paneladmin/ongkos_kirim.edit?id=<?php echo $row['id_ongkos'];?>"><button class="btn btn-success btn-xs" > <i class="fa fa-pencil"></i></button></a>
                    <button data-toggle="modal" data-target="#hapus_ongkos_kirim<?php echo $row['id_ongkos']; ?>" href="#hapus_ongkos_kirim<?php echo $row['id_ongkos']; ?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></button>
                  </CENTER>
                </td>
                </tr>
                </tbody>
                </table>
                 </div>
<div class="modal" id="hapus_ongkos_kirim<?php echo $row['id_ongkos']; ?>" tabindex="-1"    role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="H2">Hapus Data Ongkos Kirim</h4>
      </div>
      <div class="modal-body">
       <div class="alert alert-danger" role="alert" id="removeWarning">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Anda yakin ingin menghapus data ongkos kirim di kecamatan :<?php echo "$row[nama_kec]";?> ?
      </div>
      <form class="form-horizontal" id="formprovinsi">
       <form role="form" method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <label>Provinsi</label>
          <input class="form-control" name="nama_prov" value="<?php echo "$row[nama_prov]"; ?>" disable readonly required  />
        </div>
        <div class="form-group">
          <label>Kabupaten</label>
          <input class="form-control" name="nama_kab" value="<?php echo "$row[nama_kab]"; ?>" disable readonly required  />
        </div>
        <div class="form-group">
          <label>Kecamatan</label>
          <input class="form-control" name="nama_kec" value="<?php echo "$row[nama_kec]"; ?>" disable readonly required  />
        </div>
        <div class="form-group">
          <label>Harga Paket Reguler</label>
          <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input id="reg" value=" <?php echo" $reg,-"; ?>" onkeyup="convertToRupiah(this);" type="text" pattern="[0-9.]+"  disable readonly name="reg" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label>Estimasi Paket Reguler</label>
          <div class="input-group">
           <span class="input-group-addon">Hari</span>
            <input type="text" id="estimasi_reg" name="estimasi_reg" value="<?php echo" $row[estimasi_reg] Hari"; ?>"  disable readonly class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label>Harga Paket Oke</label>
          <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input id="oke" onkeyup="convertToRupiah(this);" type="text" pattern="[0-9.]+" name="oke" value=" <?php echo" $oke,-"; ?>"  disable readonly class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label>Estimasi Paket Oke</label>
          <div class="input-group">
           <span class="input-group-addon">Hari</span>
            <input type="text" id="estimasi_oke" name="estimasi_oke" value="  <?php echo" $row[estimasi_oke] Hari"; ?>"  disable readonly class="form-control col-md-7 col-xs-12">
            
            </div>
        </div>
      </div>



      <div class="modal-footer">                                            
        <a href="../paneladmin/ongkos_kirim.hapus?id=<?php echo $row['id_ongkos'];?>"> <button type="button" class="btn btn-default"></i> Yes</button></a>
        <button type="button" data-toggle="modal" data-dismiss="modal" class="btn btn-default"></i> No</button>
      </div>
    </form>
  </div>
</div>
</div>
        <?php } 
