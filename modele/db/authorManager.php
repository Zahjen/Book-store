<?php

    class AuthorManager {

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
        
        // Méthode permettant d'ajouter un auteur à la base de données
        public function insert(Author $author) {
            try {   
                $requete = $this->db->prepare('INSERT INTO author (surname, name) VALUES(:surname, :name)');
                
                $requete->bindValue(':surname', $author->get_surname(), PDO::PARAM_STR);
                $requete->bindValue(':name', $author->get_name(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un auteur dans la base de données
        public function update(Author $author) {
            try {   
                $requete = $this->db->prepare('UPDATE author SET surname = :surname, name = :name WHERE id_author = :id_author');

                $requete->bindValue(':id_author', $author->get_id_author(), PDO::PARAM_INT);
                $requete->bindValue(':surname', $author->get_surname(), PDO::PARAM_STR);
                $requete->bindValue(':name', $author->get_name(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un auteur de la base de données
        public function delete(Author $author) {
            try {   
                $requete = $this->db->prepare('DELETE FROM author WHERE id_author = :id_author');
                
                $requete->bindValue(':id_author', $author->get_id_author(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un auteur dans la base de données à l'aide de son id
        public function get($id) {
            $author = null;

            try {   
                $requete = $this->db->prepare('SELECT id_author, surname, name FROM author WHERE id_author = :id_author');

                $requete->bindValue(':id_author', $id, PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $author = new Author();

                $author->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $author;
        }

        // Méthode permettant de récupérer tous les auteurs présents dns la base de données
        public function get_all() {
            $authors = [];

            try {
                $requete = $this->db->query('SELECT id_author, surname, name FROM author');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $author = new Author();
                    $author->hydrate($datas);
                    $authors[] = $author;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $authors;
        }

    }

?>