<?php

    class BookManager {

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
        
        // Méthode permettant d'ajouter un livre à la base de données
        public function insert(Book $book) {
            try {   
                $requete = $this->db->prepare('INSERT INTO book (title, description, nb_pages, nb_octets, asin, tome, language, url, id_category, id_editor) VALUES(:title, :description, :nb_pages, :nb_octets, :asin, :tome, :language, :url,  :id_category, :id_editor)');
                
                $requete->bindValue(':title', $book->get_title(), PDO::PARAM_STR);
                $requete->bindValue(':description', $book->get_description(), PDO::PARAM_STR);
                $requete->bindValue(':nb_pages', $book->get_nb_pages(), PDO::PARAM_INT);
                $requete->bindValue(':nb_octets', $book->get_nb_octets(), PDO::PARAM_INT);
                $requete->bindValue(':asin', $book->get_asin(), PDO::PARAM_STR);
                $requete->bindValue(':tome', $book->get_tome(), PDO::PARAM_INT);
                $requete->bindValue(':language', $book->get_language(), PDO::PARAM_STR);
                $requete->bindValue(':url', $book->get_url(), PDO::PARAM_STR);
                $requete->bindValue(':id_category', $book->get_id_category(), PDO::PARAM_INT);
                $requete->bindValue(':id_editor', $book->get_id_editor(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un livre dans la base de données
        public function update(Book $book) {
            try {   
                $requete = $this->db->prepare('UPDATE book SET title = :title, description = :description, nb_pages = :nb_pages, nb_octets = :nb_octets, asin = :asin, tome = :tome, language = :language, url = :url, id_category = :id_category, id_editor = :id_editor WHERE id_book = :id_book');

                $requete->bindValue(':id_book', $book->get_id_book(), PDO::PARAM_STR);
                $requete->bindValue(':title', $book->get_title(), PDO::PARAM_STR);
                $requete->bindValue(':description', $book->get_description(), PDO::PARAM_STR);
                $requete->bindValue(':nb_pages', $book->get_nb_pages(), PDO::PARAM_INT);
                $requete->bindValue(':nb_octets', $book->get_nb_octets(), PDO::PARAM_INT);
                $requete->bindValue(':asin', $book->get_asin(), PDO::PARAM_STR);
                $requete->bindValue(':tome', $book->get_tome(), PDO::PARAM_INT);
                $requete->bindValue(':language', $book->get_language(), PDO::PARAM_STR);
                $requete->bindValue(':url', $book->get_url(), PDO::PARAM_STR);
                $requete->bindValue(':id_category', $book->get_id_category(), PDO::PARAM_INT);
                $requete->bindValue(':id_editor', $book->get_id_editor(), PDO::PARAM_INT);      


                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un livre de la base de données
        public function delete(Book $book) {
            try {   
                $requete = $this->db->prepare('DELETE FROM book WHERE id_book = :id_book');
                
                $requete->bindValue(':id_book', $book->get_id_book(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un livre dans la base de données à l'aide de son id
        public function get($id) {
            $book = null;

            try {   
                $requete = $this->db->prepare('SELECT id_book, title, description, nb_pages, nb_octets, asin, tome, language, url, id_category, id_editor FROM book WHERE id_book = :id_book');

                $requete->bindValue(':id_book', $id, PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $book = new book();

                $book->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $book;
        }

        // Méthode permettant de récupérer tous les livres présents dns la base de données
        public function get_all() {
            $books = [];

            try {
                $requete = $this->db->query('SELECT id_book, title, description, nb_pages, nb_octets, asin, tome, language, url, id_category, id_editor FROM book');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $book = new Book();
                    $book->hydrate($datas);
                    $books[] = $book;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $books;
        }

        // Méthode permettant de récupérer les dix derniers livres pour avoir l'affichage des 10 derniers livres ajoutés
        public function get_latest() {
            $books = [];

            try {
                $requete = $this->db->query('SELECT id_book, title, description, nb_pages, nb_octets, asin, tome, language, url, id_category, id_editor FROM book ORDER BY id_book DESC LIMIT 10');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $book = new Book();
                    $book->hydrate($datas);
                    $books[] = $book;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $books;
        }

        // Méthode permettant de récupérer l'entièret des livres d'une catégorie spécifique
        public function get_book_by_id_category($id_category) {
            $books = [];

            try {
                $requete = $this->db->prepare('SELECT id_book, title, description, nb_pages, nb_octets, asin, tome, language, url, id_category, id_editor FROM book WHERE id_category = :id_category');

                $requete->bindValue(':id_category', $id_category, PDO::PARAM_INT);

                $requete->execute();

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $book = new Book();
                    $book->hydrate($datas);
                    $books[] = $book;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $books;
        }

    }

?>