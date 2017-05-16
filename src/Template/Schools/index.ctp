<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 Flopy.ch
 */

$this->assign('title', __('Schools & Classes'));
echo $this->Html->script('scripts/schools/index.js', ['block' => 'script']);
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Schools</span>
                <?php foreach ($schoolClasses->groupBy('establishment.name') as $establishment => $classes){ ?>
                    <h4><?= $establishment ?> <a class="btn-floating waves-effect waves-light green tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Add a Class') ?>"><i class="material-icons">add</i></a></h4>
                    <ul class="collapsible" data-collapsible="accordion">
                        <?php foreach ($classes as $class){ ?>
                            <li>
                                <div class="collapsible-header"><?= $class->name ?></div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col s12">
                                            <ul class="collection">
                                                <?php foreach ($class->subjects as $subject){ ?>
                                                    <li class="collection-item"><div><?= $subject->name ?><a href="<?= $this->Url->build(['controller' => 'subjects', 'action' => 'edit', $subject->id]) ?>" class="secondary-content tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Edit') ?>"><i class="material-icons">edit</i></a></div></li>
                                                <?php } ?>
                                                <li class="collection-item"><a class="modal-trigger" href="#modal1"><?= __('Add a Subject') ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="divider"></div>
                <?php } ?>
                <a class="waves-effect waves-light btn m-t-20 modal-trigger" href="#modal-add-school">I'm in another School</a>
            </div>
        </div>
    </div>


</div>

<div id="modal1" class="modal modal-fixed-footer">
    <?= $this->Form->create(null) ?>
    <div class="modal-content">
        <div class="row">
            <div class="col s8">
                <?php
                $this->Form->setTemplates(['nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}</label>']);

                echo $this->Form->control('school_class_id', ['options' => ['asdfg']]);
                echo $this->Form->control('name');
                echo $this->Form->control('img');
                echo $this->Form->control('avg_round', ['label' => __('Average rounding')]);
                echo $this->Form->control('avg_semester', ['label' => __('Average rounding on Terms')]);
                echo $this->Form->control('avg_sup', ['label' => __('Rounded up (e.g. 5.25 = 5.5)'), 'type' => 'checkbox', 'checked']);
                echo $this->Form->control('terms._ids', ['options' => ['hgj']]);
                ?>
            </div>
            <div class="col s4">
                <h3>Help</h3>
                <h4><?= __('Average rounding') ?></h4>
                <p></p>
                <div class="divider"></div>
                <h4><?= __('Average rounding on Terms') ?></h4>
                <p></p>
                <div class="divider"></div>
                <h4><?= __('Rounded up (e.g. 5.25 = 5.5)') ?></h4>
                <p></p>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'modal-action waves-effect waves-green btn-flat']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

<div id="modal-add-school" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m-b-xs">
                <h4>Please find your school establishment in this list.</h4>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">school</i>
                <input type="text" id="autocomplete-establishment" class="autocomplete">
                <label for="autocomplete-establishment">School Establishment</label>
            </div>
            <div class="col s12 m-b-xs">
                <p>If your school is not in this list, you can add it by clicking the button below. <br>
                    You will need your school terms dates.</p>
                <a class="waves-effect waves-teal btn-flat" href="<?= $this->Url->build(['controller' => 'establishments', 'action' => 'add']) ?>">I doesn't find my school</a>
            </div>
        </div>

    </div>
    <div class="modal-footer">

    </div>
</div>