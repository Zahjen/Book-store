<?php

    class CommentManager {

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
        
        // Méthode permettant d'ajouter un commentaire à la base de données
        public function insert(Comment $comment) {
            try {   
                $requete = $this->db->prepare('INSERT INTO comment (description, date, mark, id_user, id_book) VALUES(:description, :date, :mark, :id_user, :id_book)');
                
                $requete->bindValue(':description', $comment->get_description(), PDO::PARAM_STR);
                $requete->bindValue(':date', $comment->get_date(), PDO::PARAM_STR);
                $requete->bindValue(':mark', $comment->get_mark(), PDO::PARAM_INT);
                $requete->bindValue(':id_user', $comment->get_id_user(), PDO::PARAM_INT);
                $requete->bindValue(':id_book', $comment->get_id_book(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un commentaire dans la base de données
        public function update(Comment $comment) {
            try {   
                $requete = $this->db->prepare('UPDATE comment SET description = :description, date = :date, mark = :mark, id_user = :id_user, id_book = :id_book WHERE id_comment = :id_comment');

                $requete->bindValue(':id_comment', $comment->get_id_comment(), PDO::PARAM_STR);
                $requete->bindValue(':description', $comment->get_description(), PDO::PARAM_STR);
                $requete->bindValue(':date', $comment->get_date(), PDO::PARAM_STR);
                $requete->bindValue(':mark', $comment->get_mark(), PDO::PARAM_INT);
                $requete->bindValue(':id_user', $comment->get_id_user(), PDO::PARAM_INT);
                $requete->bindValue(':id_book', $comment->get_id_book(), PDO::PARAM_INT);      


                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un commentaire de la base de données
        public function delete(Author $author) {
            try {   
                $requete = $this->db->prepare('DELETE FROM comment WHERE id_comment = :id_comment');
                
                $requete->bindValue(':id_comment', $comment->get_id_comment(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un commentaire dans la base de données à l'aide de son id
        public function get($id) {
            $comment = null;

            try {   
                $requete = $this->db->prepare('SELECT id_comment, description, date, mark, id_user, id_book FROM comment WHERE id_comment = :id_comment');

                $requete->bindValue(':id_comment', $id, PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $comment = new comment();

                $comment->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $comment;
        }

        // Méthode permettant de récupérer tous les commentaires présents dns la base de données
        public function get_all() {
            $comments = [];

            try {
                $requete = $this->db->query('SELECT id_comment, description, date, mark, id_user, id_book FROM comment');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $comment = new Comment();
                    $comment->hydrate($datas);
                    $comments[] = $comment;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $comments;
        }

    }

?>