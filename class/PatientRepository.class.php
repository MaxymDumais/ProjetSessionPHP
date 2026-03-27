<?php
    require_once("Repository.class.php");
	require_once("PatientDTO.class.php");

    class PatientRepository extends Repository
    {
        private static $_instance;

        private function __construct () {}

        public static function getInstance () 
		{
			if (!(self::$_instance instanceof self))
				self::$_instance = new self();

			return self::$_instance;
		}

        public function obtenirListePatient($nomClinique)
        {
            try {
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("SELECT * FROM patients where nomClinique=?");
                $ins->setFetchMode(PDO::FETCH_ASSOC);
				$ins->execute(array($nomClinique));   
                $tab = $ins->fetchAll();
                $listePatients = array();
				
				for($i=0;$i<count($tab);$i++)
				{
				  array_push($listePatients, new PatientDTO($tab[$i]["noDossier"], $tab[$i]["noAssuranceMaladie"], $tab[$i]["nom"], $tab[$i]["prenom"], $tab[$i]["adresse"], $tab[$i]["ville"], $tab[$i]["province"], $tab[$i]["codePostal"], $tab[$i]["telephone"], $tab[$i]["courriel"]));
				} 
            } catch (Exception $e) {}

            return $listePatients;
        }

        public function obtenirPatient($nomClinique, $noDossier)
        {
            $patient = null;
            try {
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("SELECT * " . 
				                       "FROM patients " . 
									  "WHERE noDossier=?
                                       AND nomClinique=?");
				$ins->setFetchMode(PDO::FETCH_ASSOC);
				$ins->execute(array($noDossier, $nomClinique));
                $resultat = $ins->fetch();
                $patient = new PatientDTO($resultat["noDossier"], $resultat["noAssuranceMaladie"], $resultat["nom"], $resultat["prenom"], $resultat["adresse"], $resultat["ville"], $resultat["province"], $resultat["codePostal"], $resultat["telephone"], $resultat["courriel"]);
            } catch (Exception $e) {}

            return $patient;
        }

        public function ajouterPatient($nomClinique, $patientDTO)
        {
            try {
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("INSERT INTO patients (nomClinique,noDossier,noAssuranceMaladie,nom,prenom,adresse,ville,province,codePostal,telephone,courriel) " . 
				                     "VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                $ins->execute(array($nomClinique,$patientDTO->getNoDossier(),$patientDTO->getNoAssuranceMaladie(),$patientDTO->getNom(),$patientDTO->getPrenom(),$patientDTO->getAdresse(),$patientDTO->getVille(),$patientDTO->getProvince(),$patientDTO->getCodePostal(),$patientDTO->getTelephone(),$patientDTO->getCourriel()));
            } catch (Exception $e) {}
        }

        public function modifierPatient($nomClinique, $patientDTO)
        {
            
            try {
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
                $ins = $pdo->prepare("UPDATE patients " . 
				                        "SET noAssuranceMaladie=?,nom=?,prenom=?,adresse=?,ville=?,province=?,codePostal=?,telephone=?,courriel=? " . 
									    "WHERE nomClinique=?
                                         AND noDossier=?");
                $ins->execute(array($patientDTO->getNoAssuranceMaladie(), $patientDTO->getNom(), $patientDTO->getPrenom(), $patientDTO->getAdresse(), $patientDTO->getVille(), $patientDTO->getProvince(), $patientDTO->getCodePostal(), $patientDTO->getTelephone(), $patientDTO->getCourriel(), $nomClinique, $patientDTO->getNoDossier()));
            } catch (Exception $e) {}
        }

        public function supprimerPatient($nomClinique, $noDossier)
        {
            try 
            {
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("DELETE FROM patients " . 
				                           "WHERE noDossier=?
                                            AND nomClinique=?");
                $ins->execute(array($noDossier, $nomClinique));
            } catch (Exception $e) {}
        }

        public function obtenirIdPatient($nomClinique, $noDossier)
        {
            $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
			$ins = $pdo->prepare("SELECT id FROM patients " . 
								  "WHERE noDossier=?
                                   AND nomClinique=?");
            $ins->setFetchMode(PDO::FETCH_ASSOC);
            $ins->execute(array($noDossier, $nomClinique));
				$resultat = $ins->fetch();
				$idPatient = $resultat["id"];
				return $idPatient;
        }
    }
?>