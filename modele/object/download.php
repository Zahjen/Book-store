<?php

    class Download implements JsonSerializable {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_user;
        private $id_book;        

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_user, $id_book) {
            $this->set_id_user($id_user);
            $this->set_id_book($id_book);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un utilisateur 
        public function get_id_user() {
            return $this->id_user;
        }

        // Méthode permettantd de récupérer les livres téléchargés par un utilisateur
        public function get_id_book() {
            return $this->id_book;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'un utilis  ateur 
        public function set_id_user($id_user) {
            $this->id_user = $id_user;
        }

        // Méthode permettantd de set les livres téléchargés par un utilisateur
        public function set_id_book($id_book) {
            $this->id_book = $id_book;
        }

        // -----------------------
        // Methods
        // -----------------------

        // Étant donné que les attributs de la classe sont en privé, pour que la fonnction json_encode() n'affiche pas seulement {}, on doit sérialiser l'objet grace à la méthode qui suit, qui est une surcharge d'une méthode situé dans l'interface JsonSerializable
        public function jsonSerialize() {
            $json = [
                'id_user' => $this->get_id_user(),
                'id_book' => $this->get_id_book()
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