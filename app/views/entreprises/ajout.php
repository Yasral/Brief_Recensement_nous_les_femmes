<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="container">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
    <!-- Main content -->
        <main>
            <!-- Topbar menu -->
            <?php
                require APPROOT . '/views/includes/topbar.php';
            ?>
            <!-- Topbar menu -->

            <!-- Main content title -->

             <div class="container-form">
                <h1 class="title-form">Inscription</h1>
                <form method="post" action="<?php echo URLROOT; ?>/entreprises/ajout">

                <!-- Don't forgot to generate the error below the form fields -->

                    <div class="user-details">
                        <!-- This section is for the user who responded to the enquiry -->
                        <div class="input-box">
                            <span class="details">Nom</span>
                            <input type="text" name="nom_repondant" id="" placeholder="Entrez le nom du repondant">
                        </div>
                        <div class="input-box">
                            <span class="details">Prenom</span>
                            <input type="text" name="prenom_repondant" id="" placeholder="Entrez le prenom du repondant">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email_repondant" id="" placeholder="Entrez l'email du repondant">
                        </div>
                        <div class="input-box">
                            <span class="details">Numero Telephone</span>
                            <input type="tel" name="numero_repondant" id="" placeholder="Entrez le numero de telephone du repondant">
                        </div>
                        <div class="input-box">
                            <span class="details">Fonction du repondant</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->

                            <select class="form-select" name="fonction_id" required>
                                <option selected value = "">Selectionner une fonction</option>
                                    <?php foreach($data['fonctions'] as $fonction) { ?>
                                        <option value="<?php echo $fonction->id_fonction; ?>" > <?php echo $fonction->libelle_fonction; ?></option>
                                    <?php } ?>
                            </select>
                            <!-- Here i have to make a select box -->
                        </div>
                        <!-- This section is for the user who responded to the enquiry -->

                        <!-- This section is for the entreprise -->
                        <div class="input-box">
                            <span class="details">Nom</span>
                            <input type="text" name="nom_entreprise" id="" placeholder="Entrez le nom de l'entreprise">
                        </div>
                        <div class="input-box">
                            <span class="details">Rccm</span>
                            <input type="text" name="rccm" id="" placeholder="Entrez le registre de commerce de l'entreprise">
                        </div>
                        <div class="input-box">
                            <span class="details">Ninea</span>
                            <input type="text" name="ninea" id="" placeholder="Entrez le ninea de l'entreprise">
                        </div>
                        <div class="input-box">
                            <span class="details">Nombre D'employes</span>
                            <input type="number" min="1" name="nbre_employes" id="" placeholder="Entrez le nombre d'employes de l'entreprise">
                        </div>
                         <div class="input-box">
                            <span class="details">Site Web</span>
                            <input type="text" name="page_web" id="" placeholder="Entrez le site web de l'entreprise">
                        </div>
                         <div class="input-box">
                            <span class="details">Siege Social</span>
                            <input type="text" name="siege_social" id="" placeholder="Entrez le siege social de l'entreprise">
                        </div>
                         <div class="input-box">
                            <span class="details">Date De Creation</span>
                            <input type="date" name="date_creation" id="" placeholder="Entrez la date de creation de l'entreprise">
                        </div>
                        <div class="input-checkbox">
                            <span class="details">Organigramme</span>
                            <input type="checkbox" name="organigramme" id="" placeholder="Disposez vous d'un organigramme" value = "1">
                        </div>
                        <div class="input-checkbox">
                            <span class="details">Dispositif De Formation</span>
                            <input type="checkbox" name="dispositif_formation" id="" placeholder="Disposez vous d'un dispositif de formation" value = "1">
                        </div>
                        <div class="input-checkbox">
                            <span class="details">Cotisation Sociale</span>
                            <input type="checkbox" name="cotisation_sociale" id="" placeholder="Cotisation sociale pour employes" value = "1">
                        </div>
                        <div class="input-checkbox">
                            <span class="details">Contrat Formel</span>
                            <input type="checkbox" name="contrat_formel" id="" placeholder="Contrat formel pour employes" value = "1">
                        </div>
                        <div class="input-box">
                            <span class="details">Secteur D'activite</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->

                            <select class="form-select" name="secteur_id" required>
                                <option selected value = "">Selectionner un secteur d'activite</option>
                                    <?php foreach($data['secteur'] as $secteur) { ?>
                                        <option value="<?php echo $secteur->id_secteur; ?>" > <?php echo $secteur->libelle_secteur; ?></option>
                                    <?php } ?>
                            </select>
                            <!-- Here i have to make a select box -->
                        </div>
                        <div class="input-box">
                            <span class="details">Quartier</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->

                            <select class="form-select" name="quartier_village_id" required>
                                <option selected value = "">Selectionner un quartier</option>
                                    <?php foreach($data['quartier'] as $quartier) { ?>
                                        <option value="<?php echo $quartier->id_quartier_village; ?>" > <?php echo $quartier->libelle_quartier_village; ?></option>
                                    <?php } ?>
                            </select>
                            <!-- Here i have to make a select box -->
                        </div>
                        <div class="input-box">
                            <span class="details">Regime Juridique</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->

                            <select class="form-select" name="regime_juridique_id" required>
                                <option selected value = "">Selectionner un regime juridique</option>
                                    <?php foreach($data['regime'] as $regime) { ?>
                                        <option value="<?php echo $regime->id_regime_juridique; ?>" > <?php echo $regime->libelle_regime_juridique; ?></option>
                                    <?php } ?>
                            </select>
                            <!-- Here i have to make a select box -->
                        </div>
                        <!-- <div class="input-box hidden-input">
                            <input type="hidden" name="repondant_id" id="" value = "" placeholder="Id du repondant">
                        </div> -->
                        <!-- This section is for the entreprise -->
                    </div>

                <!-- Don't forgot to generate the error below the form fields -->

                    <div class="button">
                        <input type="submit" value="ENVOYER">
                    </div>

                </form>
            </div>
            <!-- Main content title -->
        </main>
        <!-- Main content -->
</div>

<?php
    require APPROOT . '/views/includes/scripts.php';
?>