<?php

    class Author implements JsonSerializable  {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_author;
        private $name;
        private $surname;

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_author, $name, $surname) {
            $this->set_id_author($id_author);
            $this->set_name($name);
            $this->set_surname($surname);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un auteur 
        public function get_id_author() {
            return $this->id_author;
        }

        // Méthode permettantd de récupérer le prénom d'un auteur
        public function get_name() {
            return $this->name;
        }

        // Méthode permettantd de récupérer le nom d'un auteur
        public function get_surname() {
            return $this->surname;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'un auteur 
        public function set_id_author($id_author) {
            $this->id_author = $id_author;
        }

        // Méthode permettantd de set le prénom d'un auteur
        public function set_name($name) {
            $this->name = $name;
        }

        // Méthode permettantd de set le nom d'un auteur
        public function set_surname($surname) {
            $this->surname = $surname;
        }

        // -----------------------
        // Methods
        // -----------------------

        // Étant donné que les attributs de la classe sont en privé, pour que la fonnction json_encode() n'affiche pas seulement {}, on doit sérialiser l'objet grace à la méthode qui suit, qui est une surcharge d'une méthode situé dans l'interface JsonSerializable
        public function jsonSerialize() {
            $json = [
                'id_author' => $this->get_id_author(),
                'name' => $this->get_name(),
                'surname' => $this->get_surname()
            ];
            return $json;
        }

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