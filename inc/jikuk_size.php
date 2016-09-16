<?php
require ('../system/jenglot.php');
$categories = $_GET['kd_categories'];
$size = mysql_query("SELECT * FROM ukuran WHERE kd_categories='$categories'");
?>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr >
    <th class="text-center"> Size </th>
        <th class="text-center"> Stock </th>
</tr>
                    </thead>
                    <tbody>
<?php
while($k = mysql_fetch_array($size)){ ?>
    

						<tr>
							<td>
    						<span name='ca_accommodate' placeholder='Meals' class="form-control"><?php echo $k['nama_ukuran'] ; ?></span>
                            </td>
                            <td>
                            <input type="text" name='ca_accommodate'  placeholder='Meals' class="form-control"/>
                            </td>
                        </tr>
<?php
}
?>
                        
                    </tbody>
                </table>