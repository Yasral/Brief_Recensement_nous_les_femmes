<!-- Creation of the navigation -->
        <div class="navigation">
            <a href="" class="logo">
                <span class="icon"></span>
                <span class="title">RECENSEMENT</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo URLROOT; ?>/index">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/entreprises/liste">
                        <span class="icon">
                            <ion-icon name="list-outline"></ion-icon>
                        </span>
                        <span class="title">Liste des entreprises</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/entreprises/ajout">
                        <span class="icon">
                            <ion-icon name="add-outline"></ion-icon>
                        </span>
                        <span class="title">Ajout</span>
                    </a>
                </li>
                <li>
                    <!-- Have to change the link direction of the navigation -->
                    <?php if(isset($_SESSION['id_user'])) : ?>
                        <a href="<?php echo URLROOT; ?>/users/logout">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Deconnexion</span>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo URLROOT; ?>/users/login">
                            <span class="icon">
                                <ion-icon name="log-in-outline"></ion-icon>
                            </span>
                            <span class="title">Connexion</span>
                        </a>
                    <?php endif; ?>
                    <!-- Have to change the link direction of the navigation -->
                </li>
            </ul>
        </div>
        <!-- End of the navigation -->