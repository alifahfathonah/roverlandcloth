<?php

#-------------------------------------------------------------------------------------------------------------------#
#                                                     Information                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                               Created By    : Fajar Nurrohmat                                     #
#                                               Email         : Fajarnur24@gmail.com                                #
#                                               Name File     : jenglot.php                                         #
#                                               Release Date  :                                                     #
#                                               Created       : 20/04/16 02.23                                      #
#                                               Last Modified : 22/04/16 01.08                                      #
#                                                                                                                   #
#-------------------------------------------------------------------------------------------------------------------#
#                                            AMPUN DIGANTI NGGEH MAS / MBA                                          #
#-------------------------------------------------------------------------------------------------------------------#


if ( session_id() == '' ) session_start();
ob_start();

# Configurasi database
require ('inc/config.php');

# Configurasi layout Panel user
require ('inc/user/layout.php' );

#hak akses
require ('inc/user/acces.php' );


#hak akses
require ('inc/user/functions.php' );


?>