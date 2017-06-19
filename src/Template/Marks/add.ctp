<?php
/**
 * @var \App\View\AppView $this
 */
echo $this->Html->script('vuejs/vue.js', ['block' => 'script']);
echo $this->Html->script('lodash/lodash.min.js', ['block' => 'script']);
echo $this->Html->script('axios/axios.min.js', ['block' => 'script']);
echo $this->Html->script('scripts/marks/index.js', ['block' => 'script']);
?>

<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Add Mark') ?></span>
                <?= $this->Form->create($mark) ?>
                <?php
                echo $this->Form->control('subject_id', ['options' => $listsubjects, 'empty' => 'Please Select a Subject'], ['v-model' => 'subject']);
                ?>
                <div id="loading">
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
                <div id="form-loading"  style="display: none">
                    <?php
                    echo $this->Form->control('term_id', ['options' => []]);
                    ?>
                    <?php
                    echo $this->Form->control('value');
                    echo $this->Form->control('coefficient');
                    echo $this->Form->control('exam_date', ['empty' => true, 'class' => 'datepicker', 'type' => 'text']);
                    ?>
                </div>

                <?= $this->Form->button(__('Submit'), ['class' => 'waves-effect waves-light btn teal']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
