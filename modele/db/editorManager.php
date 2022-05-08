<?php

    class EditorManager {

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
        
        // Méthode permettant d'ajouter un editoraire à la base de données
        public function insert(Editor $editor) {
            try {   
                $requete = $this->db->prepare('INSERT INTO editor (label) VALUES(:label)');
                
                $requete->bindValue(':label', $editor->get_label(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un editoraire dans la base de données
        public function update(Editor $editor) {
            try {   
                $requete = $this->db->prepare('UPDATE editor SET label = :label WHERE id_editor = :id_editor');

                $requete->bindValue(':id_editor', $editor->get_id_editor(), PDO::PARAM_STR);
                $requete->bindValue(':label', $editor->get_label(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un editoraire de la base de données
        public function delete(Editor $editor) {
            try {   
                $requete = $this->db->prepare('DELETE FROM editor WHERE id_editor = :id_editor');
                
                $requete->bindValue(':id_editor', $editor->get_id_editor(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un editoraire dans la base de données à l'aide de son id
        public function get($id) {
            $editor = null;

            try {   
                $requete = $this->db->prepare('SELECT id_editor, label FROM editor WHERE id_editor = :id_editor');

                $requete->bindValue(':id_editor', $id, PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $editor = new editor();

                $editor->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $editor;
        }

        // Méthode permettant de récupérer tous les editoraires présents dns la base de données
        public function get_all() {
            $editors = [];

            try {
                $requete = $this->db->query('SELECT id_editor, label FROM editor');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $editor = new Editor();
                    $editor->hydrate($datas);
                    $editors[] = $editor;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $editors;
        }

    }

?>