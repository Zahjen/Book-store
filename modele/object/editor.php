<?php

    class Editor implements JsonSerializable {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_editor;
        private $label;

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_editor, $label) {
            $this->set_id_editor($id_editor);
            $this->set_label($label);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un éditeur 
        public function get_id_editor() {
            return $this->id_editor;
        }

        // Méthode permettantd de récupérer le label d'un éditeur
        public function get_label() {
            return $this->label;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'un éditeur 
        public function set_id_editor($id_editor) {
            $this->id_editor = $id_editor;
        }

        // Méthode permettantd de set le label d'un éditeur
        public function set_label($label) {
            $this->label = $label;
        }

        // -----------------------
        // Methods
        // -----------------------

        // Étant donné que les attributs de la classe sont en privé, pour que la fonnction json_encode() n'affiche pas seulement {}, on doit sérialiser l'objet grace à la méthode qui suit, qui est une surcharge d'une méthode situé dans l'interface JsonSerializable
        public function jsonSerialize() {
            $json = [
                'id_editor' => $this->get_id_editor(),
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