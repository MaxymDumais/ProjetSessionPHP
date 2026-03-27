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
    <form method="">
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
                    echo '<td><input value="Modifier" onclick="document.getElementById(\'nomClinique\').value =\'' . $cliniqueSelection . '\'; document.getElementById(\'noDossier\').value = \'' . $patient->getNoDossier() . '\'; this.form.action=\'patientController.php\'; this.form.method=\'GET\'; this.form.submit();" type="button"></td>';
                    echo '<td><input value="Supprimer" type="button" onclick="if (confirm(\'Voulez-vous vraiment supprimer le patient suivant : ' .  $patient->getPrenom() . ' '. $patient->getNom()  .'\')) { document.getElementById(\'nomClinique\').value = \'' . $cliniqueSelection . '\'; document.getElementById(\'noDossier\').value = \'' . $patient->getNoDossier() . '\'; this.form.action =\'patientController.php?action=supprimerPatient\'; this.form.method = \'POST\'; submit();}"></td>';
                    echo "</tr>";
                }
            ?>
            <input type="hidden" id="action" name="action" value="formulaireModifierPatient">
            <input type="hidden" id="nomClinique" name="nomClinique">
            <input type="hidden" id="noDossier" name="noDossier">
        </tr>
    </table>
    </form>
    <br>
    <b>Ajouter un patient à la clinique :</b>
    <br><br>

    <form method="POST" action="patientController.php?action=ajouterPatient">
        <table>
            <tr>
                <td>
                    <label>NoDossier</label>
                </td>
                <td>
                    <input name="noDossier" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>NoAssuranceMaladie</label>
                </td>
                <td>
                    <input name="noAssuranceMaladie" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nom</label>
                </td>
                <td>
                    <input name="nom" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Prénom</label>
                </td>
                <td>
                    <input name="prenom" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Adresse</label>
                </td>
                <td>
                    <input name="adresse" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Ville</label>
                </td>
                <td>
                    <input name="ville" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Province</label>
                </td>
                <td>
                    <input name="province" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Code postal</label>
                </td>
                <td>
                    <input name="codePostal" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Téléphone</label>
                </td>
                <td>
                    <input name="telephone" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Courriel</label>
                </td>
                <td>
                    <input name="courriel" required>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" value="Ajouter" style="width:100px"/>
                </td>
            </tr>
        </table>
        <input type="hidden" name="nomClinique" value="<?= $cliniqueSelection ?>"/>
    </form>
