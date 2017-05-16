<?php
/**
 * @var \App\View\AppView $this
 */

echo $this->Html->script('scripts/establishments/add.js', ['block' => 'script']);
echo $this->Html->script('https://maps.googleapis.com/maps/api/js?key='.GMAPS_API.'&libraries=places&callback=initAutocomplete', ['block' => 'script', 'async', 'defer']);
?>
<div class="row">
    <div class="col s12 m3">
        <div class="card" style="min-height: 370px">
            <div class="card-content">
                <span class="card-title">Search a school</span>
                <label for="pac-input">School Name</label>
                <input id="pac-input" type="text">
                <div class="divider"></div>

                <h4 id="gmaps-text-place-name"></h4>
                <span id="gmaps-text-place-rating"></span>
                <p id="gmaps-text-place-address"></p>
                <p id="gmaps-text-place-international_phone_number"></p>
                <p id="gmaps-text-place-website"></p>
                <br>
                <?= $this->Form->create($establishment) ?>
                <?= $this->Form->hidden('gmapid', ['id' => 'gmaps-place-id']); ?>
                <?= $this->Form->hidden('name', ['id' => 'gmaps-place-name']); ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'waves-effect waves-light btn teal']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col s12 m9">
        <div class="card" style="min-height: 370px">
            <div class="card-content">
                <div id="contact-map-canvas"></div>
                <div id="infowindow-content">
                    <span id="place-name"  class="title"></span><br>
                    <span id="place-address"></span>
                </div>
            </div>
        </div>
    </div>
</div>