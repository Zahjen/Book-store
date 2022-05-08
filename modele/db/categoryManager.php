<?php

    class CategoryManager {

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
        
        // Méthode permettant d'ajouter une catégorie à la base de données
        public function insert(Category $category) {
            try {   
                $requete = $this->db->prepare('INSERT INTO category (label) VALUES(:label)');
                
                $requete->bindValue(':label', $category->get_label(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour une catégorie dans la base de données
        public function update(Category $category) {
            try {   
                $requete = $this->db->prepare('UPDATE category SET label = :label WHERE id_category = :id_category');

                $requete->bindValue(':id_category', $category->get_id_category(), PDO::PARAM_INT);
                $requete->bindValue(':label', $category->get_label(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer une catégorie de la base de données
        public function delete(Category $category) {
            try {   
                $requete = $this->db->prepare('DELETE FROM category WHERE id_category = :id_category');
                
                $requete->bindValue(':id_category', $category->get_id_category(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer une catégorie dans la base de données à l'aide de son id
        public function get($id) {
            $category = null;

            try {   
                $requete = $this->db->prepare('SELECT id_category, label FROM category WHERE id_category = :id_category');

                $requete->bindValue(':id_category', $id, PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $category = new Category();

                $category->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $category;
        }

        // Méthode permettant de récupérer toutes les catégories présentes dns la base de données
        public function get_all() {
            $categorys = [];

            try {
                $requete = $this->db->query('SELECT id_category, label FROM category');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $category = new Category();
                    $category->hydrate($datas);
                    $categorys[$category->get_id_category()] = $category;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $categorys;
        }

    }

?>