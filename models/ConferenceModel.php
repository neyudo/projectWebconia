<?php 
    class ConferenceModel extends Model{
        # Vieleicht in Zuckuft zu gebrauchen ;)
        public function create( $commentconferenceData = array() ) {
            foreach ($conferenceData as $key => $value) {
                $$key = $value;
            }
            $this->query = "INSERT INTO conference( 
                                                conference_id,
                                                conference_city,
                                                conference_year,
                                                conference_international,
                                                conference_image
                                            ) VALUES ( ?,?,?,?,? )";
            
            $this->dataArray = [
                                "$conference_id",
                                "$conference_city",
                                "$conference_year",
                                "$conference_international",
                                "$conference_image"
                            ];
            $this->setQuery();
        }
        public function read( $conference_id  = '' ) {
            #Wir bekommen ein Variable als Parameter
            #Wenn die Variable lehr ist machen wir eine suchen in unsere Ganze Datenbank
            #Mit Parameter suchen wir die gewüschste ID
            $this->query = $conference_id  != '' 
            ? "SELECT * FROM conference WHERE conference_id  = $conference_id "
            : "SELECT * FROM conference";
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