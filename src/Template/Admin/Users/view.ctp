<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Details</span>
                <table class="table">
                    <tr>
                        <th scope="row"><?= __('Group') ?></th>
                        <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Firstname') ?></th>
                        <td><?= h($user->firstname) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Lastname') ?></th>
                        <td><?= h($user->lastname) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($user->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col m8">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Related School Classes') ?></span>
                <?php if (!empty($user->school_classes)): ?>
                    <table class="responsive-table bordered">
                        <thead>
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Establishment Id') ?></th>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <?php foreach ($user->school_classes as $schoolClasses): ?>
                            <tr>
                                <td><?= h($schoolClasses->id) ?></td>
                                <td><?= h($schoolClasses->establishment_id) ?></td>
                                <td><?= h($schoolClasses->name) ?></td>
                                <td><?= h($schoolClasses->created) ?></td>
                                <td><?= h($schoolClasses->modified) ?></td>
                                <td>
                                    <a class="dropdown-button" href="#" data-activates="action_<?= $user->id ?>"><i class="material-icons">more_vert</i></a>
                                    <ul id="action_<?= $user->id ?>" class="dropdown-content">
                                        <li><?= $this->Html->link(__('View'), ['controller' => 'SchoolClasses', 'action' => 'view', $schoolClasses->id]) ?></li>
                                        <li><?= $this->Html->link(__('Edit'), ['controller' => 'SchoolClasses', 'action' => 'edit', $schoolClasses->id]) ?></li>
                                        <li class="divider"></li>
                                        <li><?= $this->Form->postLink(__('Delete'), ['controller' => 'SchoolClasses', 'action' => 'delete', $schoolClasses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schoolClasses->id)]) ?></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>