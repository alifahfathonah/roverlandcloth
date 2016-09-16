<?php
                function mysqliConnection()
                        {              
                                // Database connection information
                                $gaSql['user']     = 'root';
                                $gaSql['password'] = '';  
                                $gaSql['db']       = 'roverland';  //Database
                                $gaSql['server']   = 'localhost';  
                                $gaSql['port']     = 3306; // 3306 is the default MySQL port
                                $gaSql['charset']  = 'utf8';
                                $db = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'], $gaSql['port']);
                                if (mysqli_connect_error()) {
                                        die( 'Error connecting to MySQL server (' . mysqli_connect_errno() .') '. mysqli_connect_error() );
                                }
                               
                                if (!$db->set_charset($gaSql['charset'])) {
                                        die( 'Error loading character set "'.$gaSql['charset'].'": '.$db->error );
                                }
                                return $db;
                        }
                       
                function Paging( $input )
                        {
                                $sLimit = "";
                                if ( isset( $input['iDisplayStart'] ) && $input['iDisplayLength'] != '-1' ) {
                                        $sLimit = " LIMIT ".intval( $input['iDisplayStart'] ).", ".intval( $input['iDisplayLength'] );
                                }
                               
                                return $sLimit;
                        }
                       
                       
                function Ordering( $input, $aColumns )
                        {
                                $aOrderingRules = array();
                                if ( isset( $input['iSortCol_0'] ) ) {
                                        $iSortingCols = intval( $input['iSortingCols'] );
                                        for ( $i=0 ; $i<$iSortingCols ; $i++ ) {
                                                if ( $input[ 'bSortable_'.intval($input['iSortCol_'.$i]) ] == 'true' ) {
                                                        $aOrderingRules[] =
                                                        $aColumns[ intval( $input['iSortCol_'.$i] ) ]." "
                                                        .($input['sSortDir_'.$i]==='asc' ? 'asc' : 'desc');
                                                }
                                        }
                                }
                               
                                if (!empty($aOrderingRules)) {
                                        $sOrder = " ORDER BY ".implode(", ", $aOrderingRules);
                                        } else {
                                        $sOrder = "";
                                }
                                return $sOrder;
                        }
                       
                function Filtering( $aColumns, $iColumnCount, $input, $db )
                        {
                                if ( isset($input['sSearch']) && $input['sSearch'] != "" ) {
                                        $aFilteringRules = array();
                                        for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
                                                if ( isset($input['bSearchable_'.$i]) && $input['bSearchable_'.$i] == 'true' ) {
                                                        $aFilteringRules[] = $aColumns[$i]." LIKE '%".$db->real_escape_string( $input['sSearch'] )."%'";
                                                }
                                        }
                                        if (!empty($aFilteringRules)) {
                                                $aFilteringRules = array('('.implode(" OR ", $aFilteringRules).')');
                                        }
                                }
                               
                                // Individual column filtering
                                for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
                                        if ( isset($input['bSearchable_'.$i]) && $input['bSearchable_'.$i] == 'true' && $input['sSearch_'.$i] != '' ) {
                                                $aFilteringRules[] = $aColumns[$i]."  LIKE '%".$db->real_escape_string($input['sSearch_'.$i])."%'";
                                        }
                                }
                               
                                if (!empty($aFilteringRules)) {
                                        $sWhere = "WHERE ".implode(" AND ", $aFilteringRules);
                                        } else {
                                        $sWhere = "WHERE 1=1 ";
                                }
                                return $sWhere;
                        }
                       
 
        mb_internal_encoding('UTF-8');
        $aColumns = array('provinsi.nama_prov', 'kabupaten.nama_kab', 'kecamatan.nama_kec', 'kelurahan.nama_kel'); //Kolom Pada Tabel
       
        // Indexed column (used for fast and accurate table cardinality)
        $sIndexColumn = 'id_kel';
       
        // DB table to use

        $sTable = 'kelurahan'; // Nama Tabel
        $sTable2 = 'kecamatan'; // Nama Tabel
        $sTable3 = 'kabupaten'; // Nama Tabel
        $sTable4 = 'provinsi'; // Nama Tabel       
       
        // Input method (use $_GET, $_POST or $_REQUEST)
        $input =& $_POST;
 
       
        $iColumnCount = count($aColumns);
       
        $db = mysqliConnection();
        $sLimit = Paging( $input );
        $sOrder = Ordering( $input, $aColumns );
        $sWhere = Filtering( $aColumns, $iColumnCount, $input, $db );
       
        $aQueryColumns = array();
        foreach ($aColumns as $col) {
                if ($col != ' ') {
                        $aQueryColumns[] = $col;
                }
        }
       
        $sQuery = "
   SELECT SQL_CALC_FOUND_ROWS provinsi.id_prov, provinsi.nama_prov,  kabupaten.id_prov, kabupaten.id_kab, kabupaten.nama_kab,  kecamatan.id_kab, kecamatan.id_kec, kecamatan.nama_kec, kelurahan.id_kel, kelurahan.id_kec, kelurahan.nama_kel
   FROM ".$sTable." AS kelurahan
        inner join ".$sTable2." AS kecamatan  on
        kelurahan.id_kec=kecamatan.id_kec
        inner join ".$sTable3." AS kabupaten  on
        kecamatan.id_kab=kabupaten.id_kab
        inner join ".$sTable4." AS provinsi  on
        kabupaten.id_prov=provinsi.id_prov
        ".$sWhere.$sOrder.$sLimit;
       
       
        $rResult = $db->query( $sQuery ) or die($db->error);
        // Data set length after filtering
        $sQuery = "SELECT FOUND_ROWS()";
        $rResultFilterTotal = $db->query( $sQuery ) or die($db->error);
        list($iFilteredTotal) = $rResultFilterTotal->fetch_row();
       
        // Total data set length
        $sQuery = "SELECT COUNT(kelurahan.".$sIndexColumn.") FROM ".$sTable." AS kelurahan INNER JOIN ".$sTable2." AS kecamatan ON kelurahan.id_kec = kecamatan.id_kec  INNER JOIN ".$sTable3." AS kabupaten ON kecamatan.id_kab = kabupaten.id_kab INNER JOIN ".$sTable4." AS provinsi ON kabupaten.id_prov = provinsi.id_prov";
        $rResultTotal = $db->query( $sQuery ) or die($db->error);
        list($iTotal) = $rResultTotal->fetch_row();
       
        /**
                * Output
        */
        $output = array(
    "sEcho"                => intval($input['sEcho']),
    "iTotalRecords"        => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData"               => array(),
        );
       
        // Looping Data
        while ( $aRow = $rResult->fetch_assoc() ) {
                $row = array();
                $btn = '<center><a href="kelurahan.edit?id='.$aRow['id_kel'].'"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a>  <button onClick="deletekelurahan(\''.$aRow['id_kel'].'\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></center>';
                $row = array( $aRow['nama_prov'], $aRow['nama_kab'], $aRow['nama_kec'], $aRow['nama_kel'], $btn);
                $output['aaData'][] = $row;
        }
       
        echo json_encode( $output );
?>