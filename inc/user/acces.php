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


function hakakses(){
  if (empty($_SESSION['id_user']) && ($_SESSION['tingkat_user']!=='2')  ){
    header('location: sign_in');
  }
}


function leveluser($allowed_roles){
  if( !in_array($_SESSION['tingkat_user'], $allowed_roles) ){
    header('location: index');
    echo '<title>Forbidden Access !</title>';
    echo '<h1>You are forbidden !</h1>';
    echo '<a href="./index"></a>';
    ob_end_flush();
  }
}

function uwesmlebu(){
  if ( !empty($_SESSION['id_user']) && ($_SESSION['tingkat_user']=='2')  ){
    header('location: home');
  }
}


function benojodiinjek($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}




?>