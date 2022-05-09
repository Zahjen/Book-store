<?php

    class WrittenByManager {

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
        
        // Méthode permettant d'ajouter un auteur à un livre à la base de données
        public function insert(WrittenBy $writtenBy) {
            try {   
                $requete = $this->db->prepare('INSERT INTO written_by (id_book, id_author) VALUES(:id_book, :id_author)');
                
                $requete->bindValue(':id_book', $writtenBy->get_id_book(), PDO::PARAM_INT);
                $requete->bindValue(':id_author', $writtenBy->get_id_author(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un auteur à un livre dans la base de données
        public function update(WrittenBy $book) {
            try {   
                $requete = $this->db->prepare('UPDATE written_by SET id_book = :id_book, id_author = :id_author');

                $requete->bindValue(':id_book', $book->get_id_book(), PDO::PARAM_INT);
                $requete->bindValue(':id_author', $book->get_id_author(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un auteur à un livre de la base de données
        public function delete(WrittenBy $writtenBy) {
            try {   
                $requete = $this->db->prepare('DELETE FROM written_by WHERE id_book = :id_book AND id_author = :id_author');
                
                $requete->bindValue(':id_book', $book->get_id_book(), PDO::PARAM_INT);
                $requete->bindValue(':id_author', $book->get_id_author(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un auteur à un livre dans la base de données à l'aide de son id
        public function get($id_book) {
            $writtenBys = [];

            try {   
                $requete = $this->db->prepare('SELECT id_book, id_author FROM written_by WHERE id_book = :id_book');

                $requete->bindValue(':id_book', $id_book, PDO::PARAM_INT);

                $requete->execute();

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $writtenBy = new WrittenBy();
                    $writtenBy->hydrate($datas);
                    $writtenBys[] = $writtenBy;
                }
            
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $writtenBys;
        }

        // Méthode permettant de récupérer tous les livres présents dns la base de données
        public function get_all() {
            $books = [];

            try {
                $requete = $this->db->query('SELECT id_book, id_author FROM written_by');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $writtenBy = new WrittenBy();
                    $writtenBy->hydrate($datas);
                    $writtenBys[] = $writtenBy;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $books;
        }

    }

?>