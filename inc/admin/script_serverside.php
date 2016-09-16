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

#-------------------------------------------------------------------------------------------------------------------#
#                                                SIK BERKAITAN KARO HAK AKSES                                       #
#-------------------------------------------------------------------------------------------------------------------#

function script_kecamatan(){
  ?>
  <script type="text/javascript" language="javascript" >
      
var dTable;
      // #tabelkecamatan adalah id pada table
      $(document).ready(function() {
        dTable = $('#tabelkecamatan').DataTable( {
          "bProcessing": true,
          "bServerSide": true,
          "bJQueryUI": false,
          "responsive": true,
          "sAjaxSource": "../serverside/server_kecamatan.php", // Load Data
          "sServerMethod": "POST",
          "columnDefs": [
        
          { "orderable": false, "targets": 3, "searchable": false },
          ]
        } );
        
        $('#tabelkecamatan').removeClass( 'display' ).addClass('table table-striped table-bordered');
     

      } );
          </script>

<?php
}

function script_kabupaten(){
  ?>
  <script type="text/javascript" language="javascript" >
      
var dTable;
      // #tabelkecamatan adalah id pada table
      $(document).ready(function() {
        dTable = $('#tabelkabupaten').DataTable( {
          "bProcessing": true,
          "bServerSide": true,
          "bJQueryUI": false,
          "responsive": true,
          "sAjaxSource": "../serverside/server_kabupaten.php", // Load Data
          "sServerMethod": "POST",
          "columnDefs": [
        
          { "orderable": false, "targets": 2, "searchable": false },
          ]
        } );
        
        $('#tabelkabupaten').removeClass( 'display' ).addClass('table table-striped table-bordered');
     

      } );
          </script>

<?php
}

function script_kelurahan(){
  ?>
  <script type="text/javascript" language="javascript" >
      
var dTable;
      // #tabelkecamatan adalah id pada table
      $(document).ready(function() {
        dTable = $('#tabelkelurahan').DataTable( {
          "bProcessing": true,
          "bServerSide": true,
          "bJQueryUI": false,
          "responsive": true,
          "sAjaxSource": "../serverside/server_kelurahan.php", // Load Data
          "sServerMethod": "POST",
          "columnDefs": [
        
          { "orderable": false, "targets": 4, "searchable": false },
          ]
        } );
        
        $('#tabelkelurahan').removeClass( 'display' ).addClass('table table-striped table-bordered');
     

      } );
          </script>

<?php
}

function script_ongkos_kirim(){
  ?>
  <script type="text/javascript" language="javascript" >
      
var dTable;
      // #tabelkecamatan adalah id pada table
      $(document).ready(function() {
        dTable = $('#tabelongkoskirim').DataTable( {
          "bProcessing": true,
          "bServerSide": true,
          "bJQueryUI": false,
          "responsive": true,
          "sAjaxSource": "../serverside/server_ongkos_kirim.php", // Load Data
          "sServerMethod": "POST",
          "columnDefs": [
        
          { "orderable": false, "targets": 8, "searchable": false },
          ]
        } );
        
        $('#tabelongkoskirim').removeClass( 'display' ).addClass('table table-striped table-bordered');
     

      } );
          </script>

<?php
}

?>