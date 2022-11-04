<?php 
    class ViewController {
        #Der Pfad von die Views
        private static $viewPath = './views/';
        #Lade alle Views 
        public function loadView( $view ) {
            require_once ( self::$viewPath . 'header.php' );
            #Hier bauen wir der Pfad der wir sehen möchten
            require_once ( self::$viewPath . $view . '.php' );
            require_once ( self::$viewPath . 'footer.php' );
        }
    }

?>