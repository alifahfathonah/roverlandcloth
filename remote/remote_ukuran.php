<?php
header('Content-type: application/json');



$valid = true;

include "../inc/config.php";
$sql="SELECT nama_ukuran FROM ukuran";
$sq=mysql_query($sql);


while ($s=mysql_fetch_array($sq)) {
    
    $d=ucwords(strtolower($s['nama_ukuran']));
    $ukuran[$d]=$d;
}

if (array_key_exists(ucwords(strtolower($_POST['nama_ukuran'])), $ukuran)) {
    $valid = false;
} 

echo json_encode(array(
    'valid' => $valid,
));

?>