<?php
   require APPROOT . '/views/includes/head.php';
?>
<div id="container">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>

     <!-- Main content -->
        <main>
            <!-- Topbar menu -->
            <!-- <div class="topbar">
                <div class="toogle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            
                <div class="search">
                    <label for="">
                        <input type="text" name="" id="" placeholder="Rechercher">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div> -->
            <?php
                require APPROOT . '/views/includes/topbar.php';
            ?>
            <!-- Topbar menu -->

            <!-- Main content title -->
            <h1 class="main-title">SEN RECENSEMENT</h1>
            <h3>La plateforme dediee aux entreprises senegalaises</h3>

            <div class="banner">
                <div class="slots">
                    <div class="images">
                        <span><img src="images/bar-chart-outline.svg" alt="Bar chart"></span>
                    </div>
                    <div class="slots-content">
                        <h5>Lorem Ipsum</h5>
                    </div>
                </div>
                <div class="slots">
                    <div class="images">
                        <span><img src="images/pie-chart-outline.svg" alt="Pie chart"></span>
                    </div>
                    <div class="slots-content">
                        <h5>Lorem Ipsum</h5>
                    </div>
                </div>
                <div class="slots">
                    <div class="images">
                        <span><img src="images/search-circle-outline.svg" alt="Search icon"></span>
                    </div>
                    <div class="slots-content">
                        <h5>Lorem Ipsum</h5>
                    </div>
                </div>
            </div>
            <!-- Main content title -->
        </main>
        <!-- Main content -->
</div>

<?php
    require APPROOT . '/views/includes/scripts.php';
?>
