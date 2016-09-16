<?php
require ('../system/jenglot.php');
$kd_categories = $_GET['kd_categories'];
$categories = mysql_query("SELECT * FROM categories WHERE kd_categories='$kd_categories' order by nama_categories");
$k = mysql_fetch_array($categories)
?>
<div class="item form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_product">Nama Product <span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nm_product" value="<?php echo $data_nm_product; ?>" name="nm_product" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
<?
echo "<option>-- Pilih categories/Kota --</option>";
while($k = mysql_fetch_array($categories)){
    echo "<option value=\"".$k['id_kab']."\">".$k['nama_kab']."</option>\n";
}
?>