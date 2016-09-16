<?php
require ('config.php');
$pemesanan = $_GET['id_pemesanan'];
$querycustomer = mysql_query("SELECT * FROM customer, pemesanan WHERE customer.kd_customer=pemesanan.kd_customer AND pemesanan.id_pemesanan='$pemesanan' ");

$k = mysql_fetch_array($querycustomer);
   $kd_bank=$k['kd_bank'];
?>
<div class="form-group">
          <label>Kode Customer</label>
          <input class="form-control" name="kd_customer" value="<?php echo "$k[kd_customer]"; ?>" disable readonly required  />
        </div>

        <div class="form-group">
          <label>Nama Customer</label>
          <input class="form-control" name="nm_customer" value="<?php echo "$k[nm_customer]"; ?>" disable readonly required  />
        </div>
        <div class="form-group">
          <label>Unik Transfer</label>
          <input class="form-control" name="unik_trasnfer" value="<?php echo "$k[unik_key]"; ?>" disable readonly required  />
        </div>
        <div class="form-group">
          <label>Total Transfer</label>
          <div class="form-group input-group">
           <span class="input-group-addon">Rp. </span>
           <input class="form-control" name="total_trasnfer" value="<?php echo  number_format($k['grand_total'],0,',','.'); ?>" readonly required  />
         </div>
       </div>
       