<?php
/**
 * @var \App\View\AppView $this
 */
echo $this->Html->script('vuejs/vue.js', ['block' => 'script']);
echo $this->Html->script('lodash/lodash.min.js', ['block' => 'script']);
echo $this->Html->script('axios/axios.min.js', ['block' => 'script']);
echo $this->Html->script('scripts/marks/index.js', ['block' => 'script']);

use \Cake\Collection\Collection;
?>
<div id="el" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div class="row">
        <?php foreach ($acyears as $acyear){ ?>
        <div class="row">
            <div class="col s12">
                <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
                    <?php foreach ($acyear->terms as $term){ ?>
                        <li class="tab col s3"><a href="#term<?= $term->id ?>"><?= $term->name ?></a></li>
                    <?php } ?>
                    <li class="tab col s3"><a href="#total>">Total</a></li>
                </ul>
            </div>
            <?php foreach ($acyear->terms as $term){ ?>
                <div id="term<?= $term->id ?>" class="col s12">
                    <?php if(count($term->subjects) > 0){
                        $marks = (new Collection($term->marks))->groupBy('subject_id')->toArray();
                        $count = array_map('count', $marks);
                        $maxMarksCount = max(array_keys($count));
                        ?>
                        <?php foreach((new Collection($term->subjects))->groupBy('school_class.name') as $classname => $subjects){ ?>
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title"><?= " - ".$classname ?></span>
                                    <table class="bordered">
                                        <tbody>
                                        <?php foreach($subjects as $subject){ ?>
                                            <tr>
                                                <td style="width: 25%"><?= $this->Html->link($subject->name, ['controller' => 'Subjects', 'action' => 'view', $subject->id]) ?></td>
                                                <?php if(isset($marks[$subject->id])){ ?>
                                                    <?php foreach($marks[$subject->id] as $mark){ ?>
                                                        <td style="width: <?= 65/$maxMarksCount ?>%"><?= $this->Number->format($mark->value) ?></td>
                                                    <?php } ?>
                                                    <?php if($maxMarksCount-count($marks[$subject->id]) > 0){
                                                        for ($i = 1; $i <= $maxMarksCount-count($marks[$subject->id]); $i++) { ?>
                                                        <td style="width: <?= 65/$maxMarksCount ?>%"> </td>
                                                    <?php } } ?>
                                                <?php }else{ ?>
                                                    <td colspan="<?= $maxMarksCount ?>"></td>
                                                <?php } ?>
                                                <td style="width: 10%"><b><?= $subject->getAverage(@$marks[$subject->id]) ?></b></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class=""></div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }else{ ?>
                    <?php } ?>
                </div>
            <?php } ?>
            <div id="total" class="col s12"><p class="p-v-sm">Test 4</p></div>
        </div>
        <?php } ?>
    </div>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large waves-effect waves-light green darken-4"><i class="material-icons">add</i></a>
        <ul>
            <li><a class="btn-floating green darken-4" href="<?= $this->Url->build(['action' => 'bulkadd']) ?>" data-position="bottom" data-delay="10" data-tooltip="Bulk Add"><i class="material-icons">playlist_add</i></a></li>
            <li><a class="btn-floating green darken-4 modal-trigger" href="#add-mark-modal" data-position="bottom" data-delay="10" data-tooltip="Add One"><i class="material-icons">add_circle</i></a></li>
        </ul>
    </div>

    <div id="add-mark-modal" class="modal modal-fixed-footer">
        <?= $this->Form->create(null, ['url' => ['action' => 'add']]) ?>
        <div class="modal-content">
            <div class="row">
                <div class="col s8">
                    <?php
                    echo $this->Form->control('subject_id', ['options' => $listsubjects], ['v-model' => 'subject']);
                    ?>
                    <div id="loading" style="display: none">
                        <div class="preloader-wrapper small active">
                            <div class="spinner-layer spinner-blue">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-red">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-yellow">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-green">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="form-loading">
                        <?php
                        echo $this->Form->control('term_id', ['options' => []]);
                        ?>
                        <?php
                        echo $this->Form->control('value');
                        echo $this->Form->control('coefficient');
                        echo $this->Form->control('exam_date', ['empty' => true, 'class' => 'datepicker']);
                        ?>
                    </div>

                </div>
            </div>

        </div>
        <div class="modal-footer">
            <?= $this->Form->button(__('Submit'), ['class' => 'modal-action waves-effect waves-green btn-flat']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>