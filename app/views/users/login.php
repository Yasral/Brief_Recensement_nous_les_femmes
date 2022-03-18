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
                <h1 class="title-form">Connexion</h1>
                <form method="post" action="<?php echo URLROOT; ?>/users/login">

                <!-- Don't forgot to generate the error below the form fields -->

                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Identifiant</span>
                            <input type="text" name="identifiant" id="" placeholder="Entrez votre identifiant">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email_user" id="" placeholder="Entrez votre email">
                        </div>
                        <div class="input-box">
                            <span class="details">Mot De Passe</span>
                            <input type="password" name="password" id="" placeholder="Entrez votre mot de passe">
                        </div>
                    </div>

                <!-- Don't forgot to generate the error below the form fields -->

                    <div class="button">
                        <input type="submit" value="ENVOYER">
                    </div>

                    <p class="options">Pas encore inscrit? <a href="<?php echo URLROOT; ?>/users/register"> Creer un compte!</a></p>
                </form>
            </div>
            <!-- Main content title -->
        </main>
        <!-- Main content -->
</div>

<?php
    require APPROOT . '/views/includes/scripts.php';
?>