<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Nessi';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>
        <?= $cakeDescription ?> - <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <!-- Styles -->
    <?= $this->Html->css('materialize.min.css') ?>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Theme Styles -->
    <?= $this->Html->css('alpha.min.css') ?>
    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('css') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="mn-content fixed-sidebar">
    <header class="mn-header navbar-fixed">
        <nav class="green darken-3">
            <div class="nav-wrapper row">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>
                <div class="header-title col s3">
                    <span class="chapter-title">Nessi</span>
                </div>
                <form class="left search col s6 hide-on-small-and-down">
                    <div class="input-field">
                        <input id="search" type="search" placeholder="Search" autocomplete="off">
                        <label for="search"><i class="material-icons search-icon">search</i></label>
                    </div>
                    <a href="javascript: void(0)" class="close-search"><i class="material-icons">close</i></a>
                </form>
                <ul class="right col s9 m3 nav-right-menu">
                    <li><a href="javascript:void(0)" data-activates="chat-sidebar" class="chat-button show-on-large"><i class="material-icons">more_vert</i></a></li>
                    <li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i><span class="badge">4</span></a></li>
                    <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle"><i class="material-icons">search</i></a></li>
                </ul>

                <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                    <li class="notificatoins-dropdown-container">
                        <ul>
                            <li class="notification-drop-title">Today</li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                        <div class="notification-text"><p><b>Alan Grey</b> uploaded new theme</p><span>7 min ago</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle deep-purple"><i class="material-icons">cached</i></div>
                                        <div class="notification-text"><p><b>Tom</b> updated status</p><span>14 min ago</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle red"><i class="material-icons">delete</i></div>
                                        <div class="notification-text"><p><b>Amily Lee</b> deleted account</p><span>28 min ago</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle cyan"><i class="material-icons">person_add</i></div>
                                        <div class="notification-text"><p><b>Tom Simpson</b> registered</p><span>2 hrs ago</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle green"><i class="material-icons">file_upload</i></div>
                                        <div class="notification-text"><p>Finished uploading files</p><span>4 hrs ago</span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-drop-title">Yestarday</li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle green"><i class="material-icons">security</i></div>
                                        <div class="notification-text"><p>Security issues fixed</p><span>16 hrs ago</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle indigo"><i class="material-icons">file_download</i></div>
                                        <div class="notification-text"><p>Finished downloading files</p><span>22 hrs ago</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <div class="notification">
                                        <div class="notification-icon circle cyan"><i class="material-icons">code</i></div>
                                        <div class="notification-text"><p>Code changes were saved</p><span>1 day ago</span></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="search-results">
        <div class="container search-container">
            <div class="row">
                <div class="col s12 search-head">
                    <div class="row">
                        <div class="col s12">
                            <div class="left">
                                <p class="search-results-title">Quick search results</p>
                                <p class="search-filter left">
                                    <input type="checkbox" class="filled-in" id="filled-in-box" checked/>
                                    <label for="filled-in-box">Google search</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="res-not-found">No results found</div>
                </div>
                <div class="col s12 m4 search-result-container">
                    <div class="card card-transparent">
                        <div class="row valign-wrapper">
                            <div class="col s3">
                                <img src="assets/images/profile-image-1.png" alt="" class="circle responsive-img z-depth-1">
                            </div>
                            <div class="col s9">
                                        <span class="search-result-text">
                                            Search <span class="search-text search-result-highlight"></span><br><span class="secondary-search-text">Last active 2 days ago</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-transparent">
                        <div class="row valign-wrapper">
                            <div class="col s3">
                                <img src="assets/images/profile-image-3.jpg" alt="" class="circle responsive-img z-depth-1">
                            </div>
                            <div class="col s9">
                                        <span class="search-result-text">
                                            News about <span class="search-text search-result-highlight"></span><br><span class="secondary-search-text">23 Blogs</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-transparent">
                        <div class="row valign-wrapper">
                            <div class="col s3">
                                <img src="assets/images/profile-image.png" alt="" class="circle responsive-img z-depth-1">
                            </div>
                            <div class="col s9">
                                        <span class="search-result-text">
                                            Tom King (Works at <span class="search-text search-result-highlight"></span>)<br><span class="secondary-search-text">Avaible for freelance work</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 search-result-container">
                    <div class="card card-transparent ">
                        <div class="row valign-wrapper">
                            <div class="col s3">
                                <span class="z-depth-1 circle search-circle indigo lighten-1">F</span>
                            </div>
                            <div class="col s9">
                                        <span class="search-result-text">
                                            <span class="search-text search-result-highlight"></span> on Facebook<br><span class="secondary-search-text"><a href="#">View website</a></span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-transparent">
                        <div class="row valign-wrapper">
                            <div class="col s3">
                                <span class="z-depth-1 circle search-circle light-blue lighten-1">T</span>
                            </div>
                            <div class="col s9">
                                        <span class="search-result-text">
                                            <span class="search-text search-result-highlight"></span> on Twitter<br><span class="secondary-search-text"><a href="#">View website</a></span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-transparent">
                        <div class="row valign-wrapper">
                            <div class="col s3">
                                <span class="z-depth-1 circle search-circle red darken-1">G</span>
                            </div>
                            <div class="col s9">
                                        <span class="search-result-text">
                                            Google+ <span class="search-text search-result-highlight"></span><br><span class="secondary-search-text"><a href="#">View website</a></span>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 search-result-container">
                    <div class="card card-transparent">
                        <div class="card-content first">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sunt in culpa qui<span class="search-text search-result-highlight"></span> quis.</p>
                        </div>
                        <div class="card-action">
                            <span class="grey-text">Yesterday, 4:56 PM</span>
                        </div>
                    </div>
                    <div class="card card-transparent">
                        <div class="card-content">
                            <p>Sunt in culpa qui <span class="search-text search-result-highlight"></span> officia deserunt mollit anim id est laborum. officia deserunt mollit anim id est laborum officia deserunt mollit anim</p>
                        </div>
                        <div class="card-action">
                            <span class="grey-text">27 January 2016</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->element('aside/chat-sidebar'); ?>
    <?= $this->element('aside/chat-messages'); ?>
    <?= $this->element('aside/slide-out'); ?>
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title"><?= $this->fetch('title'); ?></div>
            </div>
        </div>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
</div>
<div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    <?= $this->Html->script('jquery/jquery-2.2.0.min.js') ?>
    <?= $this->Html->script('materialize.min.js') ?>
    <?= $this->Html->script('material-preloader/materialPreloader.min.js') ?>
    <?= $this->Html->script('jquery/jquery-blockui/jquery.blockui.js') ?>
    <?= $this->Html->script('alpha.min.js') ?>
    <?= $this->fetch('script') ?>
</body>
</html>
