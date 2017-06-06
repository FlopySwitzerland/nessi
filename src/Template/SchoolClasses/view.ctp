<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Details') ?></span>
                <table>
                    <tr>
                        <th scope="row"><?= __('Establishment') ?></th>
                        <td><?= $schoolClass->has('establishment') ? $this->Html->link($schoolClass->establishment->name, ['controller' => 'Establishments', 'action' => 'view', $schoolClass->establishment->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($schoolClass->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($schoolClass->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($schoolClass->modified) ?></td>
                    </tr>
                </table>
                <?= $this->Html->link(__('Edit School Classes'), ['action' => 'edit', $schoolClass->id], ['class' => 'waves-effect waves-light btn teal']) ?>
            </div>
        </div>
    </div>
    <div class="col m8">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Related Subjects') ?></span>
                <?php if (!empty($schoolClass->subjects)): ?>
                    <table class="responsive-table bordered">
                        <thead>
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Avg Round') ?></th>
                            <th scope="col"><?= __('Avg Semester') ?></th>
                            <th scope="col"><?= __('Avg Sup') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <?php foreach ($schoolClass->subjects as $subjects): ?>
                            <tr>
                                <td><?= h($subjects->id) ?></td>
                                <td><?= h($subjects->name) ?></td>
                                <td><?= h($subjects->avg_round) ?></td>
                                <td><?= h($subjects->avg_semester) ?></td>
                                <td><?= h($subjects->avg_sup) ?></td>
                                <td><?= h($subjects->created) ?></td>
                                <td><?= h($subjects->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Subjects', 'action' => 'view', $subjects->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects', 'action' => 'edit', $subjects->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subjects', 'action' => 'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjects->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
