<?php 
    class CommentsModel extends Model{
        public function create( $commentData = array() ) {
            #Wir bekommen ein Array al Parameter und aus diese
            #Keys erstellen wir eine Variable mit den Variable Variable Methode $$ ;)
            foreach ($commentData as $key => $value) {
                $$key = $value;
            }
            #Dann erstellen wir unsere SQL Query 

            $this->query = "INSERT INTO comments( 
                                                comment_author,
                                                comment_email,
                                                comment_text,
                                                conference_id,
                                                comment_create_date
                                            ) VALUES ( ?,?,?,?,? )";
            
            #Wir weissen unsere neuen Variablen zu unsere geherbte Variable Data
            $this->dataArray = [
                                "$comment_author",
                                "$comment_email",
                                "$comment_text",
                                "$conference_id",
                                "$comment_create_date"
                            ];
            #Am ende mit der Funktion setQuery Exekutieren wir alles
            $this->setQuery();
        }
        public function read( $conference_id  = '' ) {
            #Wir bekommen ein Variable als Parameter
            #Wenn die Variable lehr ist machen wir eine suchen in unsere Ganze Datenbank
            #Mit Parameter suchen wir die gewüschste ID
            $this->query = $conference_id  != '' 
            ? "SELECT * FROM comments WHERE conference_id  = $conference_id "
            : "SELECT * FROM comments";
            #Am ende mit der Funktion setQuery Exekutieren wir alles
            $this->getQuery();
            #$numRows = count($this->rows);
            #Wir haben unsere Datenbank in unsere geherbte Variable Rows und weisen wir sie zu Data
            #Dann bekommen wir Data zurück
            $data = $this->rows;
            return $data;            
        }
    }
?>