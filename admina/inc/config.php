<?php
ini_set( "display_errors", true );
define( "HOST", "localhost" );
//nama database
define( "DATABASE_NAME", "back_end" );
define( "DB_USERNAME", "root" );
//password mysql
define( "DB_PASSWORD", "mypatrick" );
//dir admin
define( "DIR_ADMIN", "php-backend-generator/admina/");
//main directory
define( "DIR_MAIN", "php-backend-generator/");


define('DB_CHARACSET', 'utf8');

require_once ('Database.php');
require_once ('Datatable.php');
require_once ('My_pagination.php');
require_once ('url.php');

$db=new Database();
$pg=New My_pagination();
$dtable = new TableData();

function handleException( $exception ) {
  echo  $exception->getMessage();
}

set_exception_handler( 'handleException' );


?>
