<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 Flopy.ch
 */
echo $this->Html->css('fullcalendar/fullcalendar.min.css', ['block' => 'css']);
echo $this->Html->script('fullcalendar/moment.min.js', ['block' => 'script']);
echo $this->Html->script('fullcalendar/fullcalendar.min.js', ['block' => 'script']);
echo $this->Html->script('scripts/calendar/index.js', ['block' => 'script']);
?>

<div class="col s12 m12 l12">
    <div class="card">
        <div class="card-content">
            <div id="calendar"></div>
        </div>
    </div>
</div>
