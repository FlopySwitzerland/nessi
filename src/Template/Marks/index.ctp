<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Filter') ?></span>
            </div>
        </div>
    </div>
    <?php foreach($schoolClasses as $schoolClass){ ?>
        <?php if(count($schoolClass->subjects) > 0){ ?>
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"><?= $schoolClass->establishment->name." - ".$schoolClass->name ?></span>
                        <table class=" bordered">
                            <tbody>
                            <?php foreach($schoolClass->subjects as $subject){ ?>
                                <tr>
                                    <td><?= $this->Html->link($subject->name, ['controller' => 'Subjects', 'action' => 'view', $subject->id]) ?></td>
                                    <?php foreach($subject->marks as $mark){ ?>
                                        <td><?= $this->Number->format($mark->value) ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class=""></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>





