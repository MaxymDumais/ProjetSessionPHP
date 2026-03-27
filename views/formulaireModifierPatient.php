<br />
<b>Modifier un patient : </b>
<br />
<br />
<!--Formulaire pour la modification d'une clinique -->
<form method="POST" action="PatientController.php?action=modifierPatient">
    <table>
        <tr>
            <td>
                <label>NoDossier</label>
            </td>
            <td>
                <input name="noDossier" value="<?php echo $patient->getNoDossier(); ?>" readonly class="inputreadonly"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>No Assurance Maladie</label>
            </td>
            <td>
                <input name="noAssuranceMaladie" value="<?php echo $patient->getNoAssuranceMaladie(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nom</label>
            </td>
            <td>
                <input name="nom" value="<?php echo $patient->getNom(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Prénom</label>
            </td>
            <td>
                <input name="prenom" value="<?php echo $patient->getPrenom(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Adresse</label>
            </td>
            <td>
                <input name="adresse" value="<?php echo $patient->getAdresse(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Ville</label>
            </td>
            <td>
                <input name="ville" value="<?php echo $patient->getVille(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Province</label>
            </td>
            <td>
                <input name="province" value="<?php echo $patient->getProvince(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Code postal</label>
            </td>
            <td>
                <input name="codePostal" value="<?php echo $patient->getCodePostal(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Téléphome</label>
            </td>
            <td>
                <input name="telephone" value="<?php echo $patient->getTelephone(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Courriel</label>
            </td>
            <td>
                <input name="courriel" value="<?php echo $patient->getCourriel(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" value="Modifier"/>
                <input type="button" value="Annuler" onclick="history.back();"/>
            </td>
        </tr>
    </table>
    <input type="hidden" name="nomClinique" id="nomClinique" value="<?php echo $_GET['nomClinique']; ?>">
</form>