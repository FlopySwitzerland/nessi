<?php
/**
 * Projet : nessi-new
 * Auteur : Raphaël Gabriel
 * Date: 09.05.2017
 */

?>
<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile">
            <div class="sidebar-profile-image">
                <?= $this->Html->image('profile-image-2.png', ['class' => 'circle']) ?>
            </div>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p><?= $this->request->session()->read('Auth.User.firstname')." ".$this->request->session()->read('Auth.User.lastname'); ?></p>
                    <span><?= $this->request->session()->read('Auth.User.email') ?> <i class="material-icons right">arrow_drop_down</i></span>
                </a>
            </div>
        </div>
        <div class="sidebar-account-settings">
            <ul>
                <li class="no-padding">
                    <a class="waves-effect waves-grey"><i class="material-icons">mail_outline</i>Inbox</a>
                </li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey"><i class="material-icons">star_border</i>Starred<span class="new badge">18</span></a>
                </li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey"><i class="material-icons">done</i>Sent Mail</a>
                </li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey"><i class="material-icons">history</i>History<span class="new grey lighten-1 badge">3 new</span></a>
                </li>
                <li class="divider"></li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons">exit_to_app</i>Sign Out</a>
                </li>
            </ul>
        </div>
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding"><a class="waves-effect waves-grey" href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons">dashboard</i>Dashboard</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons">event</i>Calendar</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey" href="<?= $this->Url->build(['controller' => 'Marks', 'action' => 'index', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons">list</i>Marks</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey" href="<?= $this->Url->build(['controller' => 'Schools', 'action' => 'index', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons">school</i>Schools & Classes</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'settings', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons">settings</i>Settings</a></li>
            <?php if($this->request->session()->read('Auth.User.group_id') == 1){ ?>
                <li class="divider"></li>
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">settings_input_svideo</i>Administration<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index', 'prefix' => 'admin', 'plugin' => false]) ?>">Users Management</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Groups', 'action' => 'index', 'prefix' => 'admin', 'plugin' => false]) ?>">Groups Management</a></li>
                        </ul>
                    </div>
                </li>
            <?php } ?>


            <li class="divider"></li>
            <li class="no-padding">
                <a class="waves-effect waves-grey" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons">exit_to_app</i>Sign Out</a>
            </li>


            <!--<li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Apps<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li><a href="search.html">Search</a></li>
                        <li><a href="todo.html">Todo</a></li>
                    </ul>
                </div>
            </li>-->
        </ul>
        <div class="footer">
            <p class="copyright">© <?= date('Y') ?> Flopy.ch</p>
            <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
        </div>
    </div>
</aside>
