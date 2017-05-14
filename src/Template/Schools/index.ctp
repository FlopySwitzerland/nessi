<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 Flopy.ch
 */

$this->assign('title', __('Schools & Classes'));
//echo $this->Html->script('scripts/schools/index.js', ['block' => 'script']);
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Schools</span>
                <?php foreach ($schoolClasses->groupBy('establishment.name') as $establishment => $classes){ ?>
                    <h4><?= $establishment ?> <a class="btn-floating waves-effect waves-light green tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Add a Class') ?>"><i class="material-icons">add</i></a></h4>
                    <ul class="collapsible popout" data-collapsible="accordion">
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
                <?php } ?>
            </div>
        </div>
    </div>


</div>

<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <?= $this->Form->create(null) ?>

            <?php
            echo $this->Form->control('school_class_id', ['options' => ['asdfg']]);
            echo $this->Form->control('name');
            echo $this->Form->control('img');
            echo $this->Form->control('avg_round', ['label' => __('Average rounding')]);
            echo $this->Form->control('avg_semester', ['label' => __('Average rounding on Terms')]);
            echo $this->Form->control('avg_sup', ['label' => __('Rounded up (e.g. 5.25 = 5.5)'), 'type' => 'checkbox', 'checked']);
            echo $this->Form->control('terms._ids', ['options' => ['hgj']]);
            ?>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
</div>