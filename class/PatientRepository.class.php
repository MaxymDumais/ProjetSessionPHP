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