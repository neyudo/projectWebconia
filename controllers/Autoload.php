<?php 
    class Autoload {
        public function __construct() {
            spl_autoload_register( function ( $class ) {
                /* 
                    @ Falls etwas von modes oder controllers gebraucht wird 
                    generiet diese Funktion der Pfad, wenn es exitiert
                */
                $modelsPfath = './models/' . $class . '.php';
                $controllersPfath = './controllers/' . $class . '.php';
                $helpersPfath = './helpers/' . $class . '.php';
           
                if ( file_exists( $modelsPfath ) )  require_once ( "$modelsPfath" );
                if ( file_exists( $controllersPfath ) )  require_once ( "$controllersPfath" );
                if ( file_exists( $helpersPfath ) )  require_once ( "$helpersPfath" );
            } );
        }
    }
?>