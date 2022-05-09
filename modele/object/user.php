<?php

    class User implements JsonSerializable {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $id_user;
        private $pseudo;
        private $mail;
        private $password;
        private $is_admin;

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

        // Méthode permettantd de récupérer le statut d'un utilisateur
        public function get_is_admin() {
            return $this->is_admin;
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

        // Méthode permettantd de set le statut d'un utilisateur
        public function set_is_admin($is_admin) {
            $this->is_admin = $is_admin;
        }

        // -----------------------
        // Methods
        // -----------------------

        public function jsonSerialize() {
            $json = [
                'id_user' => $this->get_id_user(),
                'pseudo' => $this->get_pseudo(),
                'mail' => $this->get_mail(),
                'password' => $this->get_password(),
                'is_admin' => $this->get_is_admin()
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