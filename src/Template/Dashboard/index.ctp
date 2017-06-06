<?php
/**
 * Projet : nessi
 * Auteur : Raphaël Gabriel
 * Date: 11.05.2017
 */

echo $this->Html->script('chartjs/chart.min.js', ['block' => 'script']);
echo $this->Html->script('scripts/dashboard/index.js', ['block' => 'script']);
?>
<div class="row">
    <div class="col m3 s6">
        <div class="card">
            <div class="card-content">
                <h4>Marks</h4>
                <?= $this->Html->link(__('Add'), ['controller' => 'Marks', 'action' => 'add'], ['class' => 'waves-effect waves-light btn teal']) ?>
                <?= $this->Html->link(__('List'), ['controller' => 'Marks', 'action' => 'index'], ['class' => 'waves-effect waves-light btn teal']) ?>
            </div>
        </div>
    </div>
    <div class="col m3 s6">
        <div class="card">
            <div class="card-content">
                <h4>Subjects</h4>
                <?= $this->Html->link(__('List'), ['controller' => 'School', 'action' => 'index'], ['class' => 'waves-effect waves-light btn teal']) ?>
            </div>
        </div>
    </div>
    <div class="col m3 s6">
        <div class="card">
            <div class="card-content">
                <h4>Calendar</h4>
                <?= $this->Html->link(__('Go to calendar'), ['controller' => 'Calendar', 'action' => 'index'], ['class' => 'waves-effect waves-light btn teal']) ?>
            </div>
        </div>
    </div>
    <div class="col m3 s6">
        <div class="card">
            <div class="card-content">
                <h4>Settings</h4>
                <?= $this->Html->link(__('Go to Page'), ['controller' => 'Users', 'action' => 'settings'], ['class' => 'waves-effect waves-light btn teal']) ?>
            </div>
        </div>
    </div>
</div>

<!--<div class="row">
    <div class="col m6">
        <div class="card">
            <div class="card-content">
                <div>
                    <h4>Coming Soon</h4>
                    <canvas id="chart3" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>-->
