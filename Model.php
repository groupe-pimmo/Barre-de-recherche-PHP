<?php

class Model {

	/**
	 * Attribut contenant l'instance PDO
	 */
	private $bd; 


	/**
	 * Attribut statique qui contiendra l'unique instance de Model
	 */
	private static $instance = null; 

	
	/**
	 * Constructeur : effectue la connexion à la base de données. 
	 */
	private function __construct() {

		try {
			$dsn = "mysql:host=localhost;dbname=clients";      // A renseigner
			$login = "prisca";    // A renseigner
			$password = "pass"; // A renseigner
			$this->bd = new PDO($dsn,$login,$password);
			$this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->bd->query("SET nameS 'utf8'");
		} 
		catch (PDOException $e) {
			die ('Echec connexion, erreur n°'. $e->getCode() . ':' . $e->getMessage());
		}
	}


	/**
	 * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
	 */
	public static function get_model() {

        if (is_null(self::$instance))
            self::$instance = new Model();
        return self::$instance;
    }


	

	/**
	 * Ajoute le prix Nobel passé en paramètre dans la base de données.
	 * @param [array] $data contient les informations nom, prenom, adresse, cp, ville, mail, telephone
	 * @return [boolean] retourne true si la personne a été ajoutée dans la base de données, et false sinon
	 */
	public function add_client($infos){

		try{
			//Préparation de la requête
			$requete = $this->bd->prepare('INSERT INTO client VALUES(45, :nom, :prenom, :adresse, :cp, :ville, :mail, :telephone)');
			
			//Remplacement des marqueurs de place par les valeurs
			$marqueurs = ['nom', 'prenom', 'adresse', 'cp','ville', 'mail', 'telephone'];
			foreach ($marqueurs as $value) {
				$requete->bindValue(':'. $value, $infos[$value]);
			}
	
			//Exécution de la requête
			return $requete->execute();
		}
		catch (PDOException $e) {
			die ('Echec add_client, erreur n°'. $e->getCode() .':'. $e->getMessage());
		}

	}

	public function add_pro($infos){

		try{
			//Préparation de la requête
			$requete = $this->bd->prepare('INSERT INTO client VALUES(NULL, NULL,:nom, :adresse, :cp, :ville, :prestation, :type, :telephone)');
			
			//Remplacement des marqueurs de place par les valeurs
			$marqueurs = ['nom', 'adresse', 'cp', 'ville','prestation', 'formule', 'telephone'];
			foreach ($marqueurs as $value) {
				$requete->bindValue(':'. $value, $infos[$value]);
			}
	
			//Exécution de la requête
			return $requete->execute();
		}
		catch (PDOException $e) {
			die ('Echec add_pro, erreur n°'. $e->getCode() .':'. $e->getMessage());
		}

	}

	public function search_pro($infos){
		try{
			//Préparation de la requête
			$requete = $this->bd->prepare('SELECT nom_prof, adresse, cp, ville, prestation, formule, telephone FROM professionnel WHERE cp=:cp AND formule=:formule');
			
			//Remplacement des marqueurs de place par les valeurs
			$marqueurs = ['cp', 'formule'];
			foreach ($marqueurs as $value) {
				$requete->bindValue(':'. $value, $infos[$value]);
			}
	
			//Exécution de la requête
			$requete->execute();
			return $requete->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			die ('Echec search_pro, erreur n°'. $e->getCode() .':'. $e->getMessage());
		}
	}

}