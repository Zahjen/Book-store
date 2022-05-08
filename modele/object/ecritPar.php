<?php

    class EcritPar {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_book;
        private $id_author;        

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_book, $id_author) {
            $this->set_id_book($id_book);
            $this->set_id_author($id_author);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un livre 
        public function get_id_book() {
            return $this->id_book;
        }

        // Méthode permettantd de récupérer les auteurs d'un livre
        public function get_id_author() {
            return $this->id_author;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'un livre 
        public function set_id_book($id_book) {
            $this->id_book = $id_book;
        }

        // Méthode permettantd de set les auteurs d'un livre
        public function set_id_author($id_author) {
            $this->id_author = $id_author;
        }

        // -----------------------
        // Methods
        // -----------------------

        // -----------------------
        // Hydratation
        // -----------------------

        // Methode permettant d'initialiser les données avec l'utilisation d'une base de données
        public function hydrate(array $datas) {
            foreach ($datas as $key => $value) {
                $method = 'set_'.$key;

                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
    }

?>