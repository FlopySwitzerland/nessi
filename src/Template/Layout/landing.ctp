<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nessi | <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

    <?= $this->Html->css('bootstrap/bootstrap.min.css') ?>
    <?= $this->Html->css('landing/pe-icon-7-stroke.css') ?>
    <?= $this->Html->css('landing/magnific-popup.css') ?>
    <?= $this->Html->css('landing/style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body data-spy="scroll" data-target="#navbar-menu">

<!-- Navbar -->
<div id="sticky-nav-sticky-wrapper" class="sticky-wrapper is-sticky" style="height: 92px;"><div class="navbar navbar-custom sticky" role="navigation" id="sticky-nav" style="position: fixed; top: 0px;">
        <div class="container">

            <!-- Navbar-header -->
            <div class="navbar-header">

                <!-- Responsive menu button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- LOGO -->
                <a class="navbar-brand logo" href="index.html">
                    Nessi
                </a>

            </div>
            <!-- end navbar-header -->

            <!-- menu -->
            <div class="navbar-collapse collapse" id="navbar-menu">
                <!-- Navbar right -->
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->request->session()->read('Auth.User')) { ?>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index', 'prefix' => false, 'plugin' => false]) ?>" class="btn btn-white-fill navbar-btn">Go to app</a>
                        </li>
                    <?php }else{ ?>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login', 'prefix' => false, 'plugin' => false]) ?>">Login</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register', 'prefix' => false, 'plugin' => false]) ?>" class="btn btn-white-fill navbar-btn">Sign Up</a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
            <!--/Menu -->
        </div>
        <!-- end container -->
    </div></div>

<?= $this->Flash->render() ?>

<?= $this->fetch('content') ?>


<!-- FOOTER -->
<footer class="section bg-light">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="footer-alt text-center">
                    <p class="text-muted m-b-0">2017 &copy; Flopy.ch | All rights reserved.</p>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- end container -->
</footer>
<!-- END FOOTER -->


<!-- Back to top -->
<a href="#" class="back-to-top" id="back-to-top"> <i class="pe-7s-angle-up"> </i> </a>

<?= $this->Html->script('jquery/jquery-2.2.0.min.js') ?>
<?= $this->Html->script('bootstrap/bootstrap.min.js') ?>

<?= $this->Html->script('jquery/jquery-easing/jquery.easing.1.3.min.js') ?>
<?= $this->Html->script('jquery/jquery-sticky/jquery.sticky.js') ?>
<?= $this->Html->script('jquery/jquery-magnificpopup/jquery.magnific-popup.min.js') ?>
<?= $this->Html->script('jquery/jquery-ajaxchimp/jquery.ajaxchimp.js') ?>
<?= $this->Html->script('jquery/jquery.app.js') ?>

</body>

</html>