<?php 
    class CommentsModelController {
        private $model;

        public function __construct() {
            $this->model = new CommentsModel();
        }
        public function create( $commentData = array() ) {
            $this->model->create( $commentData );
        }
        public function read( $conference_id  = '' ) {
            return $this->model->read( $conference_id );
        }
    }
?>