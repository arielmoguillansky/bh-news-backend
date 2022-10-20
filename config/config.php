<?php

ini_set( "display_errors", true );

date_default_timezone_set( "America/Argentina/Buenos_Aires" );  

// http://www.php.net/manual/en/timezones.php

define( "DB_DSN", "mysql:host=localhost;dbname=bh_news" );

define( "DB_USERNAME", "username" );

define( "DB_PASSWORD", "password" );

define( "CLASS_PATH", "classes" );

define( "TEMPLATE_PATH", "templates" );

define( "HOMEPAGE_NUM_ARTICLES", 5 );

define( "ADMIN_USERNAME", "" );

define( "ADMIN_PASSWORD", "" );

require( CLASS_PATH . "/Articles.php" );

 
function handleException( $exception ) {

  echo "Sorry, a problem occurred. Please try later.";

  error_log( $exception->getMessage() );

}

 
set_exception_handler( 'handleException' );

?>