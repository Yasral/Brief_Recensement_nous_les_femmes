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
                        <div class="miniCards">
                            <div class="nom">
                                <h3>Sama Yeuff</h3>
                            </div>
                            <div class="siege">
                                <h4>Mermoz</h4>
                            </div>
                            <div class="nom-repondant">
                                <h5>Laye Tine</h5>
                            </div>
                            <div class="crud-buttons">
                                <button>Modifier</button>
                                <button>Supprimer</button>
                            </div>
                        </div>
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