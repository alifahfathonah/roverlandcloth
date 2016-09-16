<?php
header('Content-type: application/json');



$valid = true;

include "../inc/config.php";
$sql="SELECT nama_kab FROM kabupaten";
$sq=mysql_query($sql);


while ($s=mysql_fetch_array($sq)) {
    
    $d=ucwords(strtolower($s['nama_kab']));
    $kabupaten[$d]=$d;
}

if (array_key_exists(ucwords(strtolower($_POST['nama_kab'])), $kabupaten)) {
    $valid = false;
} 

echo json_encode(array(
    'valid' => $valid,
));

?>