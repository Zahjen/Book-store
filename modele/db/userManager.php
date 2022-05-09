<?php

    class UserManager {

        // -----------------------
        // Déclaration des attributs
        // -----------------------

        private $db;

        // -----------------------
        // Constructeur
        // -----------------------
        
        public function __construct($db) {
            $this->set_db($db);
        }

        // -----------------------
        // Setter
        // -----------------------

        // Méthode permettant de set le lien avec la base de données
        public function set_db(PDO $db) {
            $this->db = $db;
        }

        // -----------------------
        // Méthodes
        // -----------------------
        
        // Méthode permettant d'ajouter un utilisateur à la base de données
        public function insert(User $user) {
            try {   
                $requete = $this->db->prepare('INSERT INTO user (pseudo, mail, password) VALUES(:pseudo, :mail, :password)');
                
                $requete->bindValue(':pseudo', $user->get_pseudo(), PDO::PARAM_STR);
                $requete->bindValue(':mail', $user->get_mail());
                $requete->bindValue(':password', $user->get_password(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un utilisateur dans la base de données
        public function update(User $user) {
            try {   
                $requete = $this->db->prepare('UPDATE user SET pseudo = :pseudo, mail = :mail, password = :password, is_admin = :is_admin WHERE id_user = :id_user');

                $requete->bindValue(':id_user', $user->get_id_user(), PDO::PARAM_INT);

                $requete->bindValue(':id_user', $user->get_id_user(), PDO::PARAM_INT);
                $requete->bindValue(':pseudo', $user->get_pseudo(), PDO::PARAM_STR);
                $requete->bindValue(':mail', $user->get_mail());
                $requete->bindValue(':password', $user->get_password(), PDO::PARAM_STR);
                $requete->bindValue(':is_admin', $user->get_is_admin());

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un utilisateur de la base de données
        public function delete(User $user) {
            try {   
                $requete = $this->db->prepare('DELETE FROM user WHERE id_user = :id_user');
                
                $requete->bindValue(':id_user', $user->get_id_user(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un utilisateur dans la base de données à l'aide de son id
        public function get($id) {
            $user = null;

            try {   
                $requete = $this->db->prepare('SELECT id_user, pseudo, mail, password, is_admin FROM user WHERE id_user = :id_user');

                $requete->bindValue(':id_user', $id, PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $user = new User();

                $user->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $user;
        }

        // Méthode permettant de récupérer tous les utilisateurs présents dns la base de données
        public function get_all() {
            $users = [];

            try {
                $requete = $this->db->query('SELECT id_user, pseudo, mail, password, is_admin FROM user');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $user = new User();
                    $user->hydrate($datas);
                    $users[] = $user;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $users;
        }

        // Méthode permettant de connecter un utilisateur 
        public function login($mail) {
            $user = null;
            $valide = false;

            try {
                $requete = $this->db->prepare('SELECT id_user, pseudo, mail, password, is_admin FROM user WHERE mail = ?');

                $requete->execute(array($mail));

                if ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $user = new User();
                    $user->hydrate($datas);
                    return $user;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $valide;
        }

    }

?>