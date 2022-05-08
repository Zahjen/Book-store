<?php

    class Country {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_country;
        private $label;

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_country, $label, $mail, $password, $id_country) {
            $this->set_id_country($id_country);
            $this->set_label($label);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un pays 
        public function get_id_country() {
            return $this->id_country;
        }

        // Méthode permettantd de récupérer le label d'un pays
        public function get_label() {
            return $this->label;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'un pays 
        public function set_id_country($id_country) {
            $this->id_country = $id_country;
        }

        // Méthode permettantd de set le label d'un pays
        public function set_label($label) {
            $this->label = $label;
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