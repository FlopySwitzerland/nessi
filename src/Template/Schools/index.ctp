<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 Flopy.ch
 */

$this->assign('title', __('Schools & Classes'));
echo $this->Html->css('select2/select2.css', ['block' => 'css']);
echo $this->Html->script('select2/select2.min.js', ['block' => 'script']);
echo $this->Html->script('scripts/schools/index.js', ['block' => 'script']);
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Terms</span>
                <?php foreach ($academicyears as $academicyear) { ?>
                    <h4><?= $academicyear->start_date->year." - ".$academicyear->end_date->year ?></h4>
                    <p><?= $academicyear->start_date->i18nFormat('MMMM d Y')." - ".$academicyear->end_date->i18nFormat('MMMM d Y') ?>
                        <a href="<?= $this->Url->build(['controller' => 'Academicyears', 'action' => 'edit', $academicyear->id]) ?>" class="tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Edit') ?>"><i class="material-icons">edit</i></a>
                    <?= $this->Form->postLink('<i class="material-icons">delete_forever</i>', ['action' => 'delete', $academicyear->id], ['confirm' => __('Are you sure you want to delete {0} ?', $academicyear->start_date->year." - ".$academicyear->end_date->year), 'escape' => false, 'class' => 'tooltipped', 'data-position' => 'right', 'data-delay' => '1', 'data-tooltip' => 'Delete']) ?>
                    </p>
                    <ul class="collapsible" data-collapsible="accordion">
                        <?php foreach ($academicyear->terms as $term) { ?>
                            <li>
                                <div class="collapsible-header"><?= $term->name ?></div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col s12">
                                            <ul class="collection">
                                                <li class="collection-item">
                                                    <div>
                                                        From <b><?= $term->start_date->format('m/d/Y') ?></b> to <b><?= $term->end_date->format('m/d/Y') ?></b>
                                                        <?= $this->Form->postLink('<i class="material-icons">delete_forever</i>', ['action' => 'delete', $term->id], ['confirm' => __('Are you sure you want to delete {0} ?', $term->name), 'escape' => false, 'class' => 'secondary-content tooltipped', 'data-position' => 'right', 'data-delay' => '1', 'data-tooltip' => 'Delete']) ?>
                                                        <a href="<?= $this->Url->build(['controller' => 'terms', 'action' => 'edit', $term->id]) ?>" class="secondary-content tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Edit') ?>"><i class="material-icons">edit</i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <li>
                            <div class="collapsible-header"><a class="waves-effect waves-teal modal-trigger add-term-trigger" href="#modal-add-term" data-acid="<?= $academicyear->id ?>">Add a term</a></div>
                        </li>
                    </ul>

                    <div class="divider"></div>
                <?php } ?>
                <a class="waves-effect waves-light btn m-t-20 modal-trigger" href="#modal-add-year">Add an academic year</a>
            </div>
        </div>
    </div>
    <div class="col m5">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Schools</span>
                <?php if($academicyears->count() < 1){ ?>
                    <p>Please add an academic year and a term first</p>
                <?php }else{ ?>
                <?php foreach ($schoolClasses->groupBy('establishment.name') as $establishment => $classes){ ?>
                    <h4><?= $establishment ?> </h4>
                    <ul class="collapsible" data-collapsible="accordion">
                        <?php foreach ($classes as $class){ ?>
                            <li>
                                <div class="collapsible-header">
                                    <?= $class->name ?>
                                    <?= $this->Form->postLink('<i class="material-icons">delete_forever</i>', ['action' => 'delete', $class->id], ['confirm' => __('Are you sure you want to delete {0} ?', $class->name), 'escape' => false, 'class' => 'secondary-content tooltipped', 'data-position' => 'right', 'data-delay' => '1', 'data-tooltip' => 'Delete']) ?>
                                    <a href="<?= $this->Url->build(['controller' => 'school_classes', 'action' => 'edit', $class->id]) ?>" class="secondary-content tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Edit') ?>"><i class="material-icons">edit</i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'school_classes', 'action' => 'view', $class->id]) ?>" class="secondary-content tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Detail') ?>"><i class="material-icons">remove_red_eye</i></a>
                                </div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col s12">
                                            <ul class="collection">
                                                <?php foreach ($class->subjects as $subject){ ?>
                                                    <li class="collection-item">
                                                        <div>
                                                            <a href="<?= $this->Url->build(['controller' => 'subjects', 'action' => 'view', $class->id]) ?>"><?= $subject->name ?></a>
                                                            <?= $this->Form->postLink('<i class="material-icons">delete_forever</i>', ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete {0} ?', $subject->name), 'escape' => false, 'class' => 'secondary-content tooltipped', 'data-position' => 'right', 'data-delay' => '1', 'data-tooltip' => 'Delete']) ?>
                                                            <a href="<?= $this->Url->build(['controller' => 'subjects', 'action' => 'edit', $subject->id]) ?>" class="secondary-content tooltipped" data-position="right" data-delay="1" data-tooltip="<?= __('Edit') ?>"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                                <li class="collection-item"><a class="modal-trigger add-subject-trigger" href="#modal-add-subject" data-classid="<?= $class->id ?>"><?= __('Add a Subject') ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="divider"></div>
                <?php } ?>
                <a class="waves-effect waves-light btn m-t-20 modal-trigger" href="#modal-add-school">Add a school class</a>
                <?php } ?>
            </div>
        </div>
    </div>


</div>


<!-- ----------------- -->
<!-- ----- Modal ----- -->
<!-- ----------------- -->


<!-- Modal Add Subject -->

<div id="modal-add-subject" class="modal modal-fixed-footer">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Subjects', 'action' => 'add']]) ?>
    <div class="modal-content">
        <div class="row">
            <div class="col m8">
                <?php
                $this->Form->setTemplates(['nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}</label>']);

                echo $this->Form->hidden('school_class_id', ['id' => 'school-class-id']);
                echo $this->Form->control('name');
                // echo $this->Form->control('img');
                echo $this->Form->control('terms._ids', ['options' => $termslist]);
                echo '<br>';
                echo $this->Form->control('avg_round', ['label' => __('Average rounding'), 'value' => 0.5]);
                echo $this->Form->control('avg_semester', ['label' => __('Average rounding on Terms'), 'value' => 0.1]);
                echo $this->Form->control('avg_sup', ['label' => __('Rounded up (e.g. 5.25 = 5.5)'), 'type' => 'checkbox', 'checked']);

                ?>
                <br>
                <br>
            </div>
            <div class="col m4">
                <h3>Help</h3>
                <h4><?= __('Average rounding') ?></h4>
                <p>Round of your average on this subject.</p>
                <div class="divider"></div>
                <h4><?= __('Average rounding on Terms') ?></h4>
                <p>Round of your general average on Terms.</p>
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

<!-- Modal Add Term -->

<div id="modal-add-term" class="modal modal-fixed-footer">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Terms', 'action' => 'add']]) ?>
    <div class="modal-content">
        <div class="row">
            <div class="col m8">
                <?= $this->Form->hidden('academicyear_id', ['id' => 'academicyear-id']) ?>
                <?= $this->Form->control('name', ['type' => 'text']) ?>
                <?= $this->Form->control('start_date', ['class' => 'datepicker', 'type' => 'text']) ?>
                <?= $this->Form->control('end_date', ['class' => 'datepicker', 'type' => 'text']) ?>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'modal-action waves-effect waves-green btn-flat']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

<!-- Modal Add Year -->

<div id="modal-add-year" class="modal modal-fixed-footer">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Academicyears', 'action' => 'add']]) ?>
    <div class="modal-content">
        <div class="row">
            <div class="col m8">
                <?= $this->Form->control('start_date', ['class' => 'datepicker', 'type' => 'text']) ?>
                <?= $this->Form->control('end_date', ['class' => 'datepicker', 'type' => 'text']) ?>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col m8">
                <h4>What Are Academic Years?</h4>
                <p>An academic year and its terms are used to represent your school year and any terms (eg. semesters, trimesters, quarters) that you may have.</p>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'modal-action waves-effect waves-green btn-flat']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>


<!-- Modal Add School -->

<div id="modal-add-school" class="modal modal-fixed-footer">
    <?= $this->Form->create(null, ['url' => ['controller' => 'SchoolClasses', 'action' => 'add']]) ?>
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m-b-xs">
                <h4>Add a School Class</h4>
            </div>
            <div class="input-field col s12">
                <?= $this->Form->control('establishment_id', ['class' => 'browser-default', 'style' => 'width: 100%;', 'label' => ['class' => 'active']]); ?>
            </div>
            <div class="col s12 m-b-xs">
                <p>If your school is not in this list, you can add it by clicking <a href="<?= $this->Url->build(['controller' => 'establishments', 'action' => 'add']) ?>">here</a>.</p>
            </div>
            <div class="col s12">
                <?= $this->Form->control('name'); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'modal-action waves-effect waves-green btn-flat']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>