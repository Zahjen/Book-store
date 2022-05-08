<?php

    class Comment {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_comment;
        private $description;
        private $date;
        private $mark;
        private $id_user;
        private $id_book;

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_comment, $description, $date, $mark, $id_user, $id_book) {
            $this->set_id_comment($id_comment);
            $this->set_description($description);
            $this->set_date($date);
            $this->set_mark($mark);
            $this->set_id_user($id_user);
            $this->set_id_book($id_book);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un commentaire 
        public function get_id_comment() {
            return $this->id_comment;
        }

        // Méthode permettantd de récupérer la description d'un commentaire
        public function get_description() {
            return $this->description;
        }

        // Méthode permettantd de récupérer la date d'un commentaire
        public function get_date() {
            return $this->date;
        }

        // Méthode permettantd de récupérer la note d'un commentaire
        public function get_mark() {
            return $this->mark;
        }

        // Méthode permettantd de récupérer l'id de l'utilisateur ayant posté un commentaire
        public function get_id_user() {
            return $this->id_user;
        }

        // Méthode permettantd de récupérer l'id du livre pour lequel un commentaire a été posté
        public function get_id_book() {
            return $this->id_book;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'un commentaire 
        public function set_id_comment($id_comment) {
            $this->id_comment = $id_comment;
        }

        // Méthode permettantd de set la description d'un commentaire
        public function set_description($description) {
            $this->description = $description;
        }

        // Méthode permettantd de set le date d'un commentaire
        public function set_date($date) {
            $this->date = $date;
        }

        // Méthode permettantd de set le mot de passe d'un commentaire
        public function set_mark($mark) {
            $this->mark = $mark;
        }

        // Méthode permettantd de set l'id de l'utilisateur ayant posté un commentaire
        public function set_id_user($id_user) {
            $this->id_user = $id_user;
        }

        // Méthode permettantd de set l'id du livre pour lequel un commentaire a été posté
        public function set_id_book($id_book) {
            $this->id_book = $id_book;
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