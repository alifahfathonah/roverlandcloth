<?php
#-------------------------------------------------------------------------------------------------------------------#
#                                                     Information                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                               Created By    : Fajar Nurrohmat                                     #
#                                               Email         : Fajarnur24@gmail.com                                #
#                                               Name File     : Acces.php                                           #
#                                               Release Date  :                                                     #
#                                               Created       : 20/04/16 02.23                                      #
#                                               Last Modified : 22/04/16 01.08                                      #
#                                                                                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                                SIK BERKAITAN KARO HAK AKSES                                       #
#-------------------------------------------------------------------------------------------------------------------#


function hakAksesKakakz(){
  if (empty($_SESSION['id_user']) ){
    header('location: ../welcome/forbidden');
  }
}


function cekTingkatUser($allowed_roles){
  if( !in_array($_SESSION['tingkat_user'], $allowed_roles) ){
    header('location: ../welcome/forbidden');
    echo '<title>Forbidden Access !</title>';
    echo '<h1>You are forbidden !</h1>';
    echo '<a href="../welcome/forbidden">Go to login</a>';
    ob_end_flush();
  }
}

function sudahMasuk(){
  if ( !empty($_SESSION['id_user']) ){
    header('location: dashboard');
  }
}


function benojodiinjek($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}


// Load Inc Admin
function LoadIncAdmin(){
include "../libs/library.php";
include "../libs/fungsi_indotgl.php";
include "../libs/fungsi_combobox.php";
include "../libs/class_paging.php";
include "../libs/fungsi_rupiah.php";
}


?>