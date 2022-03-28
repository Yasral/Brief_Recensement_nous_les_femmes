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
                <h1 class="title-form">Modification D'une Entreprise</h1>
                <form method="post" action="<?php echo URLROOT; ?>/entreprises/modifier/<?php echo $data['entreprise']->id_entreprise ?>">

                <!-- Don't forgot to generate the error below the form fields -->

                    <div class="user-details">
                        <!-- This section is for the user who responded to the enquiry -->
                        <div class="input-box">
                            <span class="details">Nom</span>
                            <input type="text" name="nom_repondant" id="" value = "<?php echo $data['entreprise']->nom_repondant ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Prenom</span>
                            <input type="text" name="prenom_repondant" id="" value = "<?php echo $data['entreprise']->prenom_repondant ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email_repondant" id="" value = "<?php echo $data['entreprise']->email_repondant ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Numero Telephone</span>
                            <input type="tel" name="numero_repondant" id="" value = "<?php echo $data['entreprise']->numero_repondant ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Fonction du repondant</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->

                            <!-- This is how to transfer data from a database table to a select box -->

                            <select class="form-select" name="fonction_id" required>
                                <?php foreach($data['fonctions'] as $fonction) { ?>
                                    <!-- <span></span> -->
                                    <?php if($data['entreprise']->fonction_id == $fonction->id_fonction) : ?>
                                        <option selected value = "<?php echo $data['entreprise']->fonction_id; ?>"><?php echo $fonction->libelle_fonction; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $fonction->id_fonction; ?>" > <?php echo $fonction->libelle_fonction; ?></option>
                                    <?php endif;?>
                                <?php } ?>
                            </select>
                            <!-- Here i have to make a select box -->

                            <!-- This is how to transfer data from a database table to a select box -->
                        </div>
                        <!-- This section is for the user who responded to the enquiry -->

                        <!-- This section is for the entreprise -->
                        <div class="input-box">
                            <span class="details">Nom</span>
                            <input type="text" name="nom_entreprise" id="" value = "<?php echo $data['entreprise']->nom_entreprise ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Rccm</span>
                            <input type="text" name="rccm" id="" value = "<?php echo $data['entreprise']->rccm ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Ninea</span>
                            <input type="text" name="ninea" id="" value = "<?php echo $data['entreprise']->ninea ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Nombre D'employes</span>
                            <input type="number" name="nbre_employes" id="" value = "<?php echo $data['entreprise']->nbre_employes ?>" min="1" max="250">
                        </div>
                         <div class="input-box">
                            <span class="details">Site Web</span>
                            <input type="text" name="page_web" id="" value = "<?php echo $data['entreprise']->page_web ?>">
                        </div>
                         <div class="input-box">
                            <span class="details">Siege Social</span>
                            <input type="text" name="siege_social" id="" value = "<?php echo $data['entreprise']->siege_social ?>">
                        </div>
                         <div class="input-box">
                            <span class="details">Date De Creation</span>
                            <input type="date" name="date_creation" id="" value = "<?php echo $data['entreprise']->date_creation ?>">
                        </div>

                        <!-- This is how to transfer data from a database table to a checkbox -->

                        <div class="input-checkbox">
                            <span class="details">Organigramme</span>
                            <?php if($data['entreprise']->organigramme == 1) : ?>
                                <input type="checkbox" name="organigramme" id="" placeholder="Disposez vous d'un organigramme" value = "organigramme" checked>
                            <?php else : ?>
                                <input type="checkbox" name="organigramme" id="" placeholder="Disposez vous d'un organigramme" value = "organigramme">
                            <?php endif; ?>
                        </div>
                        <div class="input-checkbox">
                            <span class="details">Dispositif De Formation</span>
                            <?php if($data['entreprise']->dispositif_formation == 1) : ?>
                                <input type="checkbox" name="dispositif_formation" id="" placeholder="Disposez vous d'un dispositif de formation" value = "dispositif de formation" checked>
                            <?php else : ?>
                                <input type="checkbox" name="dispositif_formation" id="" placeholder="Disposez vous d'un dispositif de formation" value = "dispositif de formation">
                            <?php endif; ?>
                        </div>
                        <div class="input-checkbox">
                            <span class="details">Cotisation Sociale</span>
                            <?php if($data['entreprise']->cotisation_sociale == 1) : ?>
                                <input type="checkbox" name="cotisation_sociale" id="" placeholder="Cotisation sociale pour employes" value = "cotisation sociale" checked>
                            <?php else : ?>
                                <input type="checkbox" name="cotisation_sociale" id="" placeholder="Cotisation sociale pour employes" value = "cotisation sociale">
                            <?php endif; ?>
                        </div>
                        <div class="input-checkbox">
                            <span class="details">Contrat Formel</span>
                            <?php if($data['entreprise']->contrat_formel == 1) : ?>
                                <input type="checkbox" name="contrat_formel" id="" placeholder="Contrat formel pour employes" value = "contrat formel" checked>
                            <?php else : ?>
                                <input type="checkbox" name="contrat_formel" id="" placeholder="Contrat formel pour employes" value = "contrat formel">
                             <?php endif; ?>
                        </div>
                        <!-- This is how to transfer data from a database table to a checkbox -->


                        <div class="input-box">
                            <span class="details">Secteur D'activite</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->
                            
                            <select class="form-select" name="secteur_id" required>
                                <?php foreach($data['secteur'] as $secteur) { ?>
                                    <!-- <span></span> -->
                                    <?php if($data['entreprise']->secteur_id == $secteur->id_secteur) : ?>
                                        <option selected value = "<?php echo $data['entreprise']->secteur_id; ?>"><?php echo $secteur->libelle_secteur; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $secteur->id_secteur; ?>" > <?php echo $secteur->libelle_secteur; ?></option>
                                    <?php endif;?>
                                <?php } ?>
                            </select>
                            <!-- Here i have to make a select box -->
                        </div>
                        <div class="input-box">
                            <span class="details">Quartier</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->

                            <select class="form-select" name="quartier_village_id" required>
                                <?php foreach($data['quartier'] as $quartier) { ?>
                                    <!-- <span></span> -->
                                    <?php if($data['entreprise']->quartier_village_id == $quartier->id_quartier_village) : ?>
                                        <option selected value = "<?php echo $data['entreprise']->quartier_village_id; ?>"><?php echo $quartier->libelle_quartier_village; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $quartier->id_quartier_village; ?>" > <?php echo $quartier->libelle_quartier_village; ?></option>
                                    <?php endif;?>
                                <?php } ?>
                            </select>
                            <!-- Here i have to make a select box -->
                        </div>
                        <div class="input-box">
                            <span class="details">Regime Juridique</span>
                            <!-- Here i have to make a select box -->
                            <!-- <input type="tel" name="" id="" placeholder="Entrez votre numero de telephone"> -->

                            <select class="form-select" name="regime_juridique_id" required>
                                <?php foreach($data['regime'] as $regime) { ?>
                                    <!-- <span></span> -->
                                    <?php if($data['entreprise']->regime_juridique_id == $regime->id_regime_juridique) : ?>
                                        <option selected value = "<?php echo $data['entreprise']->regime_juridique_id; ?>"><?php echo $regime->libelle_regime_juridique; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $regime->id_regime_juridique; ?>" > <?php echo $regime->libelle_regime_juridique; ?></option>
                                    <?php endif;?>
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

</body>
</html>