<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Edit</span>
                <?= $this->Form->create($subject) ?>
                <?php
                $this->Form->setTemplates(['nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}</label>']);

                echo $this->Form->control('school_class_id', ['options' => $schoolClasses]);
                echo $this->Form->control('name');
                // echo $this->Form->control('img');
                echo $this->Form->control('terms._ids', ['options' => $terms, 'empty' => true]);
                echo $this->Form->control('avg_round', ['label' => __('Average rounding'), 'value' => 0.5]);
                echo $this->Form->control('avg_semester', ['label' => __('Average rounding on Terms'), 'value' => 0.1]);
                echo $this->Form->control('avg_sup', ['label' => __('Rounded up (e.g. 5.25 = 5.5)'), 'type' => 'checkbox', 'checked']);
                ?>
<br>
<br>
                <?= $this->Form->button(__('Save'), ['class' => 'waves-effect waves-light btn teal']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
