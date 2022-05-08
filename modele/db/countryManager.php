<?php

    class CountryManager {

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
        
        // Méthode permettant d'ajouter un pays à la base de données
        public function insert(Country $country) {
            try {   
                $requete = $this->db->prepare('INSERT INTO country (label) VALUES(:label)');
                
                $requete->bindValue(':label', $country->get_label(), PDO::PARAM_STR);

                $requete->execute();
                
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de mettre à jour un pays dans la base de données
        public function update(Country $country) {
            try {   
                $requete = $this->db->prepare('UPDATE country SET label = :label WHERE id_country = :id_country');

                $requete->bindValue(':id_country', $country->get_id_country(), PDO::PARAM_INT);

                $requete->bindValue(':label', $country->label(), PDO::PARAM_STR);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de supprimer un pays de la base de données
        public function delete(Country $country) {
            try {   
                $requete = $this->db->prepare('DELETE FROM country WHERE id_country = :id_country');
                
                $requete->bindValue(':id_country', $country->get_id_country(), PDO::PARAM_INT);

                $requete->execute();
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }
        }

        // Méthode permettant de récupérer un pays dans la base de données à l'aide de son id
        public function get($id) {
            $country = null;

            try {   
                $requete = $this->db->prepare('SELECT id_country, label FROM country WHERE id_country = :id_country');

                $requete->bindValue(':id_country', $id, PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $country = new Country();

                $country->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $country;
        }

        
        public function get_by_label($label) {
            $country = null;

            try {   
                $requete = $this->db->prepare('SELECT id_country, label FROM country WHERE label = :label');

                $requete->bindValue(':label', $label, PDO::PARAM_STR);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $country = new Country();

                $country->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $country;
        }

        // Méthode permettant de récupérer un pays dans la base de données à l'aide de son id
        public function get_last_id() {
            $country = null;

            try {   
                $requete = $this->db->prepare('SELECT id_country, label FROM country WHERE id_country = :id_country');

                $requete->bindValue(':id_country', 'LAST_INSERT_ID()', PDO::PARAM_INT);

                $requete->execute();

                $datas = $requete->fetch(PDO::FETCH_ASSOC);
                
                $country = new Country();

                $country->hydrate($datas);
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $country;
        }

        // Méthode permettant de récupérer tous les payss présents dns la base de données
        public function get_all() {
            $contries = [];

            try {
                $requete = $this->db->query('SELECT id_country, label FROM country');

                while ($datas = $requete->fetch(PDO::FETCH_ASSOC)) {
                    $country = new Country();
                    $country->hydrate($datas);
                    $contries[] = $country;
                }
            } catch (Exception $erreur) {
                die('Erreur : '.$erreur->getMessage());
            }

            return $contries;
        }

    }

?>