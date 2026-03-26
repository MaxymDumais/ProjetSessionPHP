<?php
    require_once(__DIR__ . "/../partials/header.php");
    require_once(__DIR__ . "/../class/PatientRepository.class.php");
    require_once(__DIR__ . "/../class/CliniqueRepository.class.php");

    if(!isset($_GET["action"]))
		$_GET["action"] = "afficherListePatient";

    switch ($_GET["action"])
    {
        case "afficherListePatient":
            $listeClinique = CliniqueRepository::getInstance()->obtenirListeClinique();

            if (!isset($_GET["nomClinique"]) || $_GET["nomClinique"] == null)
                $cliniqueSelection = $listeClinique[0]->getNom();
            else 
                $cliniqueSelection = $_GET["nomClinique"];

            $listePatients = PatientRepository::getInstance()->obtenirListePatient($cliniqueSelection);


            require_once(__DIR__ . "/../views/afficherListePatient.php");
            break;
    }
	include(__DIR__ . "/../partials/footer.php");
?>