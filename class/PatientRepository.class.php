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
            
        }

        public function ajouterPatient($nomClinique, $patientDTO)
        {
            
        }

        public function modifierPatient($nomClinique, $patientDTO)
        {
            
        }

        public function supprimerPatient($nomClinique, $noDossier)
        {
            
        }

        public function obtenirIdPatient($nomClinique, $noDossier)
        {
            
        }
    }
?>