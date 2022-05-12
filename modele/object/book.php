<?php

    class Book implements JsonSerializable {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_book;
        private $title;
        private $description;
        private $nb_pages;
        private $nb_octets;
        private $asin;
        private $tome;
        private $language;
        private $url;
        private $id_category;
        private $id_editor;
        private $id_author;
        

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_book, $title, $description, $nb_pages, $nb_octets, $asin, $tome, $language, $url, $mark, $id_author, $id_category, $id_editor) {
            $this->set_id_book($id_book);
            $this->set_title($title);
            $this->set_description($description);
            $this->set_nb_pages($nb_pages);
            $this->set_nb_octets($nb_octets);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un livre 
        public function get_id_book() {
            return $this->id_book;
        }

        // Méthode permettantd de récupérer le titre d'un livre
        public function get_title() {
            return $this->title;
        }

        // Méthode permettantd de récupérer la description d'un livre
        public function get_description() {
            return $this->description;
        }

        // Méthode permettantd de récupérer le nombre de pages d'un livre
        public function get_nb_pages() {
            return $this->nb_pages;
        }

        // Méthode permettantd de récupérer le nombre d'octet d'un livre
        public function get_nb_octets() {
            return $this->nb_octets;
        }

        // Méthode permettantd de récupérer l'asin d'un livre
        public function get_asin() {
            return $this->asin;
        }

        // Méthode permettantd de récupérer le tome d'un livre
        public function get_tome() {
            return $this->tome;
        }

        // Méthode permettantd de récupérer la langue d'un livre
        public function get_language() {
            return $this->language;
        }

        // Méthode permettantd de récupérer l'url d'un livre
        public function get_url() {
            return $this->url;
        }

        // Méthode permettantd de récupérer l'id de la catégorie d'un livre
        public function get_id_category() {
            return $this->id_category;
        }

        // Méthode permettantd de récupérer l'id de l'éditeur d'un livre
        public function get_id_editor() {
            return $this->id_editor;
        }

        // Méthode permettantd de récupérer l'id de l'auteur d'un livre
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

        // Méthode permettantd de set le titre d'un livre
        public function set_title($title) {
            $this->title = $title;
        }

        // Méthode permettantd de set le description d'un livre
        public function set_description($description) {
            $this->description = $description;
        }

        // Méthode permettantd de set le mot de passe d'un livre
        public function set_nb_pages($nb_pages) {
            $this->nb_pages = $nb_pages;
        }

        // Méthode permettantd de set l'id de l'utilisateur ayant posté un livre
        public function set_nb_octets($nb_octets) {
            $this->nb_octets = $nb_octets;
        }

        // Méthode permettantd de set l'asin d'un livre
        public function set_asin($asin) {
            $this->asin = $asin;
        }

        // Méthode permettantd de set le tome d'un livre
        public function set_tome($tome) {
            $this->tome = $tome;
        }

        // Méthode permettantd de set la langue d'un livre
        public function set_language($language) {
            $this->language = $language;
        }

        // Méthode permettantd de set l'url d'un livre
        public function set_url($url) {
            $this->url = $url;
        }

        // Méthode permettantd de set l'id de la catégorie d'un livre
        public function set_id_category($id_category) {
            $this->id_category = $id_category;
        }

        // Méthode permettantd de set l'id de l'éditeur d'un livre
        public function set_id_editor($id_editor) {
            $this->id_editor = $id_editor;
        }
        
        // Méthode permettantd de set l'id de l'auteur d'un livre
        public function set_id_author($id_author) {
            $this->id_author = $id_author;
        }

        // -----------------------
        // Methods
        // -----------------------

        // Étant donné que les attributs de la classe sont en privé, pour que la fonnction json_encode() n'affiche pas seulement {}, on doit sérialiser l'objet grace à la méthode qui suit, qui est une surcharge d'une méthode situé dans l'interface JsonSerializable
        public function jsonSerialize() {
            $json = [
                'id_book' => $this->get_id_book(),
                'title' => $this->get_title(),
                'description' => $this->get_description(),
                'nb_pages' => $this->get_nb_pages(),
                'nb_octets' => $this->get_nb_octets(),
                'asin' => $this->get_asin(),
                'tome' => $this->get_tome(),
                'language' => $this->get_language(),
                'url' => $this->get_url(),
                'id_category' => $this->get_id_category(),
                'id_editor' => $this->get_id_editor(),
                'id_author' => $this->get_id_author(),
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