<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 MOB
 */
?>
<div class="row">

    <div class="col m12 l4 offset-l4">
        <div class="card">
            <div class="card-content center-align">
                <img src="<?= $secretDataUri ?>" class="responsive-img hide-on-small-only" width="256px" alt="">
                <!-- Mobile Device -->
                <p class="hide-on-med-and-up"><a class="btn-floating btn-large waves-effect waves-light black" href="<?= $secretDataLink ?>"><i class="material-icons">phonelink_lock</i></a></p>
                <br>
                <p class="hide-on-med-and-up"><?= __("It's seem you're on a handle device, please click on the button to add Nessi on your two factor application ") ?></p>
                <br>
                <code class="flow-text language-markup"><?= $secret ?></code>
                <p class="m-t-lg flow-text">Nessi</p>
            </div>
        </div>
    </div>
    <div class="col m12 l4 offset-l4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">To enable double authentication</span>
                <ol>
                    <li>Install an application compatible on your mobile device</li>
                    <li>Open the application scan the barcode on your computer screen using the camera on your phone or tablet.</li>
                    <li>If your mobile device does not have a camera, enter the code that appears below the barcode.</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l4 offset-l4">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s6">
                        <?= $this->Form->postLink('<i class="material-icons left">cancel</i> Disable', ['action' => 'disableTwoFactor'], ['confirm' => __('Are you sure you want to disable the two step authentication ?'), 'escape' => false, 'class' => 'waves-effect red btn']) ?>
                    </div>
                    <div class="col s6 right-align">
                        <a class="waves-effect green btn" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'settings', 'prefix' => false, 'plugin' => false]) ?>"><i class="material-icons left">check</i>Ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
