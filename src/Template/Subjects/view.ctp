<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('title', $subject->name);
?>
<nav class="large-3 medium-4 columns">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List School Classes'), ['controller' => 'SchoolClasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School Class'), ['controller' => 'SchoolClasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marks'), ['controller' => 'Marks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mark'), ['controller' => 'Marks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="middle-content">
    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l8">
            <div class="card visitors-card">
                <div class="card-content">
                    <span class="card-title">Visitors<span class="secondary-title">Showing stats from the last week</span></span>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-content">
                    <div class="card-options">
                        <ul>
                            <li class="red-text"><span class="badge blue-grey lighten-3">optimal</span></li>
                        </ul>
                    </div>
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
                            <th scope="row"><?= __('Img') ?></th>
                            <td><?= h($subject->img) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($subject->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Marks Count') ?></th>
                            <td><?= $this->Number->format($subject->marks_count) ?></td>
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
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($subject->marks)): ?>
        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l12">
                <div class="card invoices-card">
                    <div class="card-content">
                        <div class="card-options">
                            <input type="text" class="expand-search" placeholder="Search" autocomplete="off">
                        </div>
                        <span class="card-title">Marks</span>
                        <table class="table-responsive table-bordered">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Subject Id') ?></th>
                                <th scope="col"><?= __('Value') ?></th>
                                <th scope="col"><?= __('Coefficient') ?></th>
                                <th scope="col"><?= __('Exam Date') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($subject->marks as $marks): ?>
                                <tr>
                                    <td><?= h($marks->id) ?></td>
                                    <td><?= h($marks->subject_id) ?></td>
                                    <td><?= h($marks->value) ?></td>
                                    <td><?= h($marks->coefficient) ?></td>
                                    <td><?= h($marks->exam_date) ?></td>
                                    <td><?= h($marks->created) ?></td>
                                    <td><?= h($marks->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Marks', 'action' => 'view', $marks->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Marks', 'action' => 'edit', $marks->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Marks', 'action' => 'delete', $marks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marks->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty($subject->terms)): ?>
        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l12">
                <div class="card invoices-card">
                    <div class="card-content">
                        <div class="card-options">
                            <input type="text" class="expand-search" placeholder="Search" autocomplete="off">
                        </div>
                        <span class="card-title">Terms</span>
                        <table class="table-responsive table-bordered">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Academicyear Id') ?></th>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Start Date') ?></th>
                                <th scope="col"><?= __('End Date') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modifed') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($subject->terms as $terms): ?>
                                <tr>
                                    <td><?= h($terms->id) ?></td>
                                    <td><?= h($terms->academicyear_id) ?></td>
                                    <td><?= h($terms->name) ?></td>
                                    <td><?= h($terms->start_date) ?></td>
                                    <td><?= h($terms->end_date) ?></td>
                                    <td><?= h($terms->created) ?></td>
                                    <td><?= h($terms->modifed) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Terms', 'action' => 'view', $terms->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Terms', 'action' => 'edit', $terms->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Terms', 'action' => 'delete', $terms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terms->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
