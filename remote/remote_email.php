<?php
header('Content-type: application/json');



$valid = true;

include "../inc/config.php";
$sql="SELECT email FROM customer";
$sq=mysql_query($sql);


while ($s=mysql_fetch_array($sq)) {
    
    $d=ucwords(strtolower($s['email']));
    $customer[$d]=$d;
}

if (array_key_exists(ucwords(strtolower($_POST['email'])), $customer)) {
    $valid = false;
} 

echo json_encode(array(
    'valid' => $valid,
));

?>