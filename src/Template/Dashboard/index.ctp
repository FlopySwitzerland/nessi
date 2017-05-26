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
    <div class="col s6">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Radar Chart<small>Chart.js</small></span>
                <div>
                    <canvas id="chart3" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col s6">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Radar Chart</span>

            </div>
        </div>
    </div>
</div>
