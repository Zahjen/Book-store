<?php

    class DownloadManager {

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
        
        // Méthode permettant d'ajouter un livre à un utilisateur à la base de données
        public function insert(Download $download) {
            try {   
                $requete = $this->db->prepare('INSERT INTO download (id_user, id_book) VALUES(:id_user, :id_book)');
                
                $requete->bindValue(':id_user', $download->get_id_user(), PDO::PARAM_INT);
                $requete->bindValue(':id_book', $download->get_id_book(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un livre à un utilisateur dans la base de données
        public function update(Download $book) {
            try {   
                $requete = $this->db->prepare('UPDATE download SET id_user = :id_user, id_book = :id_book');

                $requete->bindValue(':id_user', $book->get_id_user(), PDO::PARAM_INT);
                $requete->bindValue(':id_book', $book->get_id_book(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un livre à un utilisateur de la base de données
        public function delete(Download $download) {
            try {   
                $requete = $this->db->prepare('DELETE FROM download WHERE id_user = :id_user AND id_book = :id_book');
                
                $requete->bindValue(':id_user', $book->get_id_user(), PDO::PARAM_INT);
                $requete->bindValue(':id_book', $book->get_id_book(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un livre à un utilisateur dans la base de données à l'aide de son id
        public function get($id_user) {
            $downloads = [];

            try {   
                $requete = $this->db->prepare('SELECT id_user, id_book FROM download WHERE id_user = :id_user');

                $requete->bindValue(':id_user', $id_user, PDO::PARAM_INT);

                $requete->execute();

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $download = new Download();
                    $download->hydrate($datas);
                    $downloads[] = $download;
                }
            
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $downloads;
        }

        // Méthode permettant de récupérer tous les utilisateurs présents dns la base de données
        public function get_all() {
            $books = [];

            try {
                $requete = $this->db->query('SELECT id_user, id_book FROM download');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $download = new Download();
                    $download->hydrate($datas);
                    $downloads[$download->get_id_user()] = $download;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $books;
        }

    }

?>