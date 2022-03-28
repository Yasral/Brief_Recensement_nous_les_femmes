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
            <!-- Details list -->
            <div class="listes">
                <div class="entreprises">
                    <div class="cardHeader">
                        <h2>Liste des entreprises</h2>
                    </div>
                    <div class="cardEntreprise">
                        <!-- Don't forget to use a for loop and grid display -->
                        <?php foreach($data as $liste) { ?>
                        <div class="miniCards">
                            <div class="nom">
                                <h3><?php echo $liste->nom_entreprise ?></h3>
                            </div>
                            <div class="siege">
                                <h4><?php echo $liste->siege_social ?></h4>
                            </div>
                            <div class="nom-repondant">
                                <h5><?php echo $liste->prenom_repondant . " " . $liste->nom_repondant?></h5>
                            </div>
                            <?php if(isset($_SESSION['id_user']) && $_SESSION['id_user'] == $liste->user_id) : ?>
                                <div class="crud-buttons">
                                    <!-- <button>Modifier</button>
                                    <button>Supprimer</button> -->
                                    <a href="<?php echo URLROOT . "/entreprises/modifier/" . $liste->id_entreprise ?>">Modifier</a>
                                    <a href="">Supprimer</a>
                                </div>
                            <?php endif; ?> 
                        </div>
                        <?php }?>
                        <!-- Don't forget to use a for loop and grid display -->
                    </div>
                </div>
            </div>                
            <!-- Details list -->
            <!-- Main content title -->
        </main>
        <!-- Main content -->
</div>

<?php
    require APPROOT . '/views/includes/scripts.php';
?>

</body>
</html>