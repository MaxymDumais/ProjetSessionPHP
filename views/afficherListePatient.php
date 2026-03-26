<h3>Liste des patient(s)</h3>
    <form method="get">
        <label>Sélectionnez une clinique : </label>
    <select name="nomClinique" onchange="this.form.submit()">
        <?php
            foreach ($listeClinique as $clinique) 
            {
                if ($cliniqueSelection == $clinique->getNom())
                    echo "<option value='" . $clinique->getNom() . "' selected>" . $clinique->getNom() . "</option>";
                else
                    echo "<option value='" . $clinique->getNom() . "'>" . $clinique->getNom() . "</option>";
            }
        ?>
    </select>   
</form>
<br><br><br>
    <table>
        <tr>
            <th>NoDossier</th>
            <th>NoAssuranceMaladie</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Province</th>
            <th>Code postal</th>
            <th>Téléphone</th>
            <th>Courriel</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <form method="">
            <?php
                foreach ($listePatients as $patient) 
                {
                    echo "<tr>";
                    echo "<td>" . $patient->getNoDossier() . "</td>";
                    echo "<td>" . $patient->getNoAssuranceMaladie() . "</td>";
                    echo "<td>" . $patient->getPrenom() . "</td>";
                    echo "<td>" . $patient->getNom() . "</td>";
                    echo "<td>" . $patient->getAdresse() . "</td>";
                    echo "<td>" . $patient->getVille() . "</td>";
                    echo "<td>" . $patient->getProvince() . "</td>";
                    echo "<td>" . $patient->getCodePostal() . "</td>";
                    echo "<td>" . $patient->getTelephone() . "</td>";
                    echo "<td>" . $patient->getCourriel() . "</td>";
                    // echo '<td><input value="Modifier" onclick="document.getElementById(\'nomClinique\').value =\'' . $clinique->getNom() . '\'; this.form.action=\'CliniqueController.php\'; this.form.method=\'GET\'; submit();" type="button"></td>';
                    // echo '<td><input value="Supprimer" type="button" onclick="if (confirm(\'Voulez-vous vraiment supprimer la clinique : ' .  $clinique->getNom() . '\')) { document.getElementById(\'nomClinique\').value = \'' . $clinique->getNom() . '\'; this.form.action =\'CliniqueController.php?action=supprimerClinique\'; this.form.method = \'POST\'; submit();}"></td>';
                    echo "</tr>";
                }
            ?>
            <input type="hidden" id="nomClinique" name="nomClinique">
        </form>
        </tr>
    </table>
    <br>
    <b>Ajouter un patient à la clinique :</b>
    <br><br>

    <form method="POST" action="patientController.php?action=ajouterPatient">
        <table>
            
        </table>
    </form>
