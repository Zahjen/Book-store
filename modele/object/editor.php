<?php

    class Editor {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_editor;
        private $label;
        private $date;
        private $nb_edition;

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_editor, $label, $date, $nb_edition) {
            $this->set_id_editor($id_editor);
            $this->set_label($label);
            $this->set_date($date);
            $this->set_nb_edition($nb_edition);
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

        // Méthode permettantd de récupérer le date d'un éditeur
        public function get_date() {
            return $this->date;
        }

        // Méthode permettantd de récupérer le mot de passe d'un éditeur
        public function get_nb_edition() {
            return $this->nb_edition;
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

        // Méthode permettantd de set le date d'un éditeur
        public function set_date($date) {
            $this->date = $date;
        }

        // Méthode permettantd de set le mot de passe d'un éditeur
        public function set_nb_edition($nb_edition) {
            $this->nb_edition = $nb_edition;
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