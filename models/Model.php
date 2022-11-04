<?php 
    abstract class Model {
        private static $db_host = 'localhost';
        private static $db_user = 'root';
        private static $db_pass = '';
        private static $db_name = 'project';
        #Verbindung Variable
        private $conn;
        #Hiermit senden wir den Query der wir machen möchten INSERT, UPDATE, DELETE
        protected $query;
        #Wir speichen unsere DB in diese Array
        protected $rows = array();
        #Die Info mit POST speichen wir in eine Array und giben wir als Parameter
        protected $dataArray = array();
        # Methoden
        # CRUD abstract
        abstract protected function create();
        abstract protected function read();
        /* abstract protected function update();
        abstract protected function delete(); */

        #DB connection
        private function db_open() {
        $PDOConnectionText = 'mysql:host='
                    . self::$db_host . ';'
                    . ' dbname='
                    . self::$db_name;
        try {
            $this->conn = new PDO( $PDOConnectionText, self::$db_user, self::$db_pass );
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            return $this->conn;
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        }
        # Schließt die Verbindung
        private function db_close() {
            $this->conn = null;
        }
        #Damit können wir  (INSERT UPDATE DELETE) 
        protected function setQuery() {
            $this->db_open();
            $result = $this->conn->prepare( $this->query )->execute( $this->dataArray );
            $this->db_close();
        }
        #Hier machen wir ein get  (SELECT) und weissen wir in eine Array
        protected function getQuery() {
            $this->db_open();
            $result = $this->conn->query( $this->query );
            $result->execute();
            $this->rows = $result->fetchAll( PDO::FETCH_ASSOC );
            $result = null;
            $this->db_close();
            return $this->rows;
        }
    }

    

?>