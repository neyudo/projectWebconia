<?php 
    class Router {
        public $router;

        public function __construct( $router ) {
            if ( true ) {
                # wir weissen router home, wenn get r nicht existiert
                $this->route = isset( $_GET['r'] ) ? $_GET['r'] : 'home';
                $controller = new ViewController();
                switch ( $this->route ) {
                    case 'home':
                        $controller->loadView( 'home' );
                        break;
                    case 'post':
                        $controller->loadView( 'post' );
                        break;
                    default:
                        $controller->loadView( 'error404' );
                        break;
                }
            }            
        }
    }
?>