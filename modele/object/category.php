<?php

    class Category implements JsonSerializable {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_category;
        private $label;

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_category, $label) {
            $this->set_id_category($id_category);
            $this->set_label($label);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'une catégorie 
        public function get_id_category() {
            return $this->id_category;
        }

        // Méthode permettantd de récupérer le nom d'une catégorie
        public function get_label() {
            return $this->label;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'une catégorie 
        public function set_id_category($id_category) {
            $this->id_category = $id_category;
        }

        // Méthode permettantd de set le label d'une catégorie
        public function set_label($label) {
            $this->label = $label;
        }

        // -----------------------
        // Methods
        // -----------------------

        // Étant donné que les attributs de la classe sont en privé, pour que la fonnction json_encode() n'affiche pas seulement {}, on doit sérialiser l'objet grace à la méthode qui suit, qui est une surcharge d'une méthode situé dans l'interface JsonSerializable
        public function jsonSerialize() {
            $json = [
                'id_category' => $this->get_id_category(),
                'label' => $this->get_label()
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