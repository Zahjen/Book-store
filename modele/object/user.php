<?php

    class User {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_user;
        private $pseudo;
        private $mail;
        private $password;
        private $id_country;

        // -----------------------
        // Constructeur
        // -----------------------

        /*
        public function __construct($id_user, $pseudo, $mail, $password, $id_country) {
            $this->set_id_user($id_user);
            $this->set_pseudo($pseudo);
            $this->set_mail($mail);
            $this->set_password($password);
            $this->set_id_country($id_country);
        }*/

        // -----------------------
        // Getter
        // -----------------------

        // Méthode permettant de récupérer l'id d'un utilisateur 
        public function get_id_user() {
            return $this->id_user;
        }

        // Méthode permettantd de récupérer le pseudo d'un utilisateur
        public function get_pseudo() {
            return $this->pseudo;
        }

        // Méthode permettantd de récupérer le mail d'un utilisateur
        public function get_mail() {
            return $this->mail;
        }

        // Méthode permettantd de récupérer le mot de passe d'un utilisateur
        public function get_password() {
            return $this->password;
        }

        // Méthode permettantd de récupérer l'id du pays d'un utilisateur
        public function get_id_country() {
            return $this->id_country;
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set l'id d'un utilisateur 
        public function set_id_user($id_user) {
            $this->id_user = $id_user;
        }

        // Méthode permettantd de set le pseudo d'un utilisateur
        public function set_pseudo($pseudo) {
            $this->pseudo = $pseudo;
        }

        // Méthode permettantd de set le mail d'un utilisateur
        public function set_mail($mail) {
            $this->mail = $mail;
        }

        // Méthode permettantd de set le mot de passe d'un utilisateur
        public function set_password($password) {
            $this->password = $password;
        }

        // Méthode permettantd de set l'id du pays d'un utilisateur
        public function set_id_country($id_country) {
            $this->id_country = $id_country;
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