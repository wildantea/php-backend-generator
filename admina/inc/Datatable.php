<?php
//error_reporting(0);
/*
 * Script:    DataTables server-side script for PHP and MySQL
 * Copyright: 2012 - John Becker, Beckersoft, Inc.
 * Copyright: 2010 - Allan Jardine
 * License:   GPL v2 or BSD (3-point)
 */
//modified by wildantea
//wildannudin@gmail.com
  
class TableData {
 
 	private $_db;
 	protected $_join=array();

	public function __construct() {

		try {
			$host		= 'localhost';
			$database	= DATABASE_NAME;
			$user		= DB_USERNAME;
			$passwd		= DB_PASSWORD;
		
		    $this->_db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $passwd, array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
		    error_log("Failed to connect to database: ".$e->getMessage());
		}		
		
	}

	
	public function get($table, $index_column, $columns,$joins=null) {

		// Paging
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ) {
			$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".intval( $_GET['iDisplayLength'] );
		}
		
		// Ordering
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) ) {
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ) {
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ) {
					$sortDir = (strcasecmp($_GET['sSortDir_'.$i], 'ASC') == 0) ? 'ASC' : 'DESC';
					$sOrder .= "".$columns[ intval( $_GET['iSortCol_'.$i] ) ]." ". $sortDir .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ) {
				$sOrder = "";
			}
		}
		
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($columns) ; $i++ ) {
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ) {
					$sWhere .= "".$columns[$i]." LIKE :search OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		// Individual column filtering
		for ( $i=0 ; $i<count($columns) ; $i++ ) {
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ) {
				if ( $sWhere == "" ) {
					$sWhere = "WHERE ";
				}
				else {
					$sWhere .= " AND ";
				}
				$sWhere .= "".$columns[$i]." LIKE :search".$i." ";
			}
		}
		
		// SQL queries get data to display
	/*	if ($joins!='') {
		} else {
			$sQuery = "SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $columns))." FROM ".$table." ".$sWhere." ".$sOrder." ".$sLimit;
		
		}*/
$sQuery = "SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $columns))." FROM ".$table." ".$joins." ".$sWhere." ".$sOrder." ".$sLimit;
	
		$statement = $this->_db->prepare($sQuery);
		
		// Bind parameters
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$statement->bindValue(':search', '%'.$_GET['sSearch'].'%', PDO::PARAM_STR);
		}
		for ( $i=0 ; $i<count($columns) ; $i++ ) {
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ) {
				$statement->bindValue(':search'.$i, '%'.$_GET['sSearch_'.$i].'%', PDO::PARAM_STR);
			}
		}

		$statement->execute();
		$rResult = $statement->fetchAll();
		
		$iFilteredTotal = current($this->_db->query('SELECT FOUND_ROWS()')->fetch());
		
		// Get total number of rows in table
		/*if ($joins!='') {
		} else {
			$sQuery = "SELECT COUNT(".$index_column.") FROM ".$table."";
		
		}*/

$sQuery = "SELECT COUNT(".$index_column.") FROM ".$table.""." ".$joins;
	
		$iTotal = current($this->_db->query($sQuery)->fetch());
		
		$secho = (isset($_GET['sEcho'])?$_GET['sEcho']:'');
		// Output
		$output = array(
			"sEcho" => intval($secho),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		
		// Return array of values
		foreach($rResult as $aRow) {
				
			$row = array();			
			for ( $i = 0; $i < count($columns); $i++ ) {


				
				if ( $columns[$i] == "version" ) {
					// Special output formatting for 'version' column
					$row[] = ($aRow[ $columns[$i] ]=="0") ? '-' : $aRow[ $columns[$i] ];
				}
				else if ( $columns[$i] != ' ' ) {
			
					$row[] = $aRow[$i] ;
				}
			}
			
			$output['aaData'][] = $row;
		}
		
		
		echo json_encode( $output );
	}

	public function extra($var)
	{

	}


}

/*header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
*/
// Get the data
//$table_data->get('table_name', 'index_column', array('column1', 'column2', 'columnN'));
 
 
/*
 * Alternatively, you may want to use the same class for several differnt tables for different pages.
 * By adding something similar to the following to your .htaccess file you can control this a little more...
 *
 * RewriteRule ^pagename/data/?$ data.php?_page=PAGENAME [L,NC,QSA]
 *
 
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_REQUEST['_page'])) {
        	if($_REQUEST['_page'] === 'PAGENAME') {
	            $table_data->get('table_name', 'index_column', array('column1', 'column2', 'columnN'));
	        }
        }
        break;
    default:
        header('HTTP/1.1 400 Bad Request');
}
*/


?>