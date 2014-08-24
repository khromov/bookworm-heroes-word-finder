<?php $app->render('partials/header.php'); ?>
<?php $app->render('partials/navigation.php'); ?>

<!-- Header -->
<header>
    <div class="container hero-main">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Enter your letters</span>
                    <hr class="star-light">
                </div>
                <div class="main-form">
                    <?php $app->render('partials/main-form.php'); ?>
                </div>

                <!--
                <div class="help-text">
                    <span class="heading">How to use</span>
                </div>
                -->
            </div>
        </div>
    </div>
</header>

<?php $app->render('partials/how-to-use.php'); ?>
<?php /* $app->render('partials/extra.php'); */ ?>
<?php $app->render('partials/analytics.php'); ?>
<?php $app->render('partials/footer.php'); ?>