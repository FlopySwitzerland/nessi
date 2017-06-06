<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Subject') ?></span>
                <table>
                    <tr>
                        <th scope="row"><?= __('School Class') ?></th>
                        <td><?= $subject->has('school_class') ? $this->Html->link($subject->school_class->name, ['controller' => 'SchoolClasses', 'action' => 'view', $subject->school_class->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($subject->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Avg Round') ?></th>
                        <td><?= $this->Number->format($subject->avg_round) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Avg Semester') ?></th>
                        <td><?= $this->Number->format($subject->avg_semester) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Avg Sup') ?></th>
                        <td><?= $this->Number->format($subject->avg_sup) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($subject->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($subject->modified) ?></td>
                    </tr>
                </table>
                <?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id], ['class' => 'waves-effect waves-light btn teal']) ?>
            </div>
        </div>
    </div>
    <div class="col m8">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Related Marks') ?></span>
                <?php if (!empty($subject->marks)): ?>
                    <table class="responsive-table bordered">
                        <thead>
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Value') ?></th>
                            <th scope="col"><?= __('Coefficient') ?></th>
                            <th scope="col"><?= __('Exam Date') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <?php foreach ($subject->marks as $marks): ?>
                            <tr>
                                <td><?= h($marks->id) ?></td>
                                <td><?= h($marks->value) ?></td>
                                <td><?= h($marks->coefficient) ?></td>
                                <td><?= h($marks->exam_date) ?></td>
                                <td><?= h($marks->created) ?></td>
                                <td><?= h($marks->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Marks', 'action' => 'edit', $marks->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Marks', 'action' => 'delete', $marks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marks->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col m8">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Related Terms') ?></span>
                <?php if (!empty($subject->terms)): ?>
                    <table class="responsive-table bordered">
                        <thead>
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Academicyear') ?></th>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Start Date') ?></th>
                            <th scope="col"><?= __('End Date') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <?php foreach ($subject->terms as $terms): ?>
                            <tr>
                                <td><?= h($terms->id) ?></td>
                                <td><?= h($terms->academicyear_id) ?></td>
                                <td><?= h($terms->name) ?></td>
                                <td><?= h($terms->start_date) ?></td>
                                <td><?= h($terms->end_date) ?></td>
                                <td><?= h($terms->created) ?></td>
                                <td><?= h($terms->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Terms', 'action' => 'edit', $terms->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Terms', 'action' => 'delete', $terms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terms->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
