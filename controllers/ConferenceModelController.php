<?php 
    class ConferenceModelController {
        private $model;

        public function __construct() {
            $this->model = new ConferenceModel();
        }
        public function read( $conference  = '' ) {
            return $this->model->read( $conference );
        }
    }
?>