<?php

    class Mark {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $mark;

        // -----------------------
        // Constructeur
        // -----------------------

        public function __construct($mark) {
            $this->set_mark($mark);
        }

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer la valeur d'une note 
        public function get_mark() {
            return $this->mark;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set la valeur d'une note 
        public function set_mark($mark) {
            $this->mark = $mark;
        }

        // -----------------------
        // Methods
        // -----------------------

    }

?>