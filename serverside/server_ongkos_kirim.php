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
        $aColumns = array('provinsi.nama_prov', 'kabupaten.nama_kab', 'kecamatan.nama_kec', 'ongkos_kirim.reg', 'ongkos_kirim.estimasi_reg', 'ongkos_kirim.oke', 'ongkos_kirim.estimasi_oke', 'ongkos_kirim.origin'); //Kolom Pada Tabel
       
        // Indexed column (used for fast and accurate table cardinality)
        $sIndexColumn = 'id_ongkos';
       
        // DB table to use
        $sTable = 'ongkos_kirim'; // Nama Tabel
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
   SELECT SQL_CALC_FOUND_ROWS provinsi.id_prov, provinsi.nama_prov,  kabupaten.id_prov, kabupaten.id_kab, kabupaten.nama_kab,  kecamatan.id_kab, kecamatan.id_kec, kecamatan.nama_kec, ongkos_kirim.id_ongkos, ongkos_kirim.reg, ongkos_kirim.estimasi_reg, ongkos_kirim.oke, ongkos_kirim.estimasi_oke, ongkos_kirim.origin
   FROM ".$sTable." AS ongkos_kirim
        inner join ".$sTable2." AS kecamatan  on
        ongkos_kirim.id_kec=kecamatan.id_kec
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
        $sQuery = "SELECT COUNT(ongkos_kirim.".$sIndexColumn.") FROM ".$sTable." AS ongkos_kirim INNER JOIN ".$sTable2." AS kecamatan ON ongkos_kirim.id_kec = kecamatan.id_kec  INNER JOIN ".$sTable3." AS kabupaten ON kecamatan.id_kab = kabupaten.id_kab INNER JOIN ".$sTable4." AS provinsi ON kabupaten.id_prov = provinsi.id_prov";
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
        while ( $aRow = $rResult->fetch_assoc() ) 
            
        {
//            $rp='rp';
//            $pa= number_format($aRow['nama_prov'],0,',','.');
//            $reg=$aRow['reg'];
  //          $reg= number_format($reg,0,',','.');
    //        $oke=$aRow['oke'];
      //      $oke= number_format($oke,0,',','.');
            //$s='rp ';
            //$as=$s.$reg
  //          $prov=number_format($prov,0,',','.');
                $row = array();
                $btn = '<center><a href="ongkos_kirim.edit?id='.$aRow['id_ongkos'].'"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a>  <button onClick="deleteongkos_kirim(\''.$aRow['id_ongkos'].'\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></center>';
                $row = array( $aRow['nama_prov'] , $aRow['nama_kab'], $aRow['nama_kec'], 'Rp. '. number_format($aRow['reg'],0,',','.').',-'  , $aRow['estimasi_reg'].' Hari' , 'Rp. '. number_format($aRow['oke'],0,',','.').',-' , $aRow['estimasi_oke'].' Hari', $aRow['origin'], $btn);
                $output['aaData'][] = $row;
        }
       
        echo json_encode( $output );
?>