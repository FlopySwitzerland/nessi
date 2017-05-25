<?php
/**
 * @var \App\View\AppView $this
 */
echo $this->Html->script('scripts/marks/index.js', ['block' => 'script']);
?>
<div class="row">

    <div class="row">
        <div class="col s12">
            <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
                <?php foreach ($terms as $term){ ?>
                    <li class="tab col s3"><a href="#term<?= $term->id ?>"><?= $term->name ?></a></li>
                <?php } ?>
                <li class="tab col s3"><a href="#total>">Total</a></li>
            </ul>
        </div>
        <?php foreach ($terms as $term){ ?>
            <div id="term<?= $term->id ?>" class="col s12">
                <?php foreach($schoolClasses as $schoolClass){ ?>
                    <?php if(count($schoolClass->subjects) > 0){ ?>
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title"><?= $schoolClass->establishment->name." - ".$schoolClass->name ?></span>
                                <table class=" bordered">
                                    <tbody>
                                    <?php foreach($schoolClass->subjects as $subject){ ?>
                                        <tr>
                                            <td><?= $this->Html->link($subject->name, ['controller' => 'Subjects', 'action' => 'view', $subject->id]) ?></td>
                                            <?php foreach($subject->marks as $mark){ ?>
                                                <?php if($mark->term_id == $term->id){ ?>
                                                    <td><?= $this->Number->format($mark->value) ?></td>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if($maxMarksCount-$subject->marks_count > 0){ ?>
                                                <td colspan="<?= $maxMarksCount-$subject->marks_count ?>"></td>
                                            <?php } ?>
                                            <td><b><?= $subject->getAverage() ?></b></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <div class=""></div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>
        <div id="total" class="col s12"><p class="p-v-sm">Test 4</p></div>
    </div>

</div>

<div class="fixed-action-btn" style="top: 70px; right: 35px;">
    <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#add-mark-modal"><i class="material-icons">add</i></a>
</div>

<div id="add-mark-modal" class="modal modal-fixed-footer">
    <?= $this->Form->create(null, ['url' => ['action' => 'add']]) ?>
    <div class="modal-content">
        <div class="row">
            <div class="col s8">
                <?php
                echo $this->Form->control('subject_id', ['options' => $subjects]);
                echo $this->Form->control('term');
                echo $this->Form->control('value');
                echo $this->Form->control('coefficient');
                echo $this->Form->control('exam_date', ['empty' => true, 'class' => 'datepicker']);
                ?>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'modal-action waves-effect waves-green btn-flat']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>