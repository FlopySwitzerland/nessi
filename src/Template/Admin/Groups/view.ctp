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
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($group->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($group->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($group->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col m8">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('Related Users') ?></span>
                <?php if (!empty($group->users)): ?>
                    <table class="responsive-table bordered">
                        <thead>
                        <tr>
                            <th scope="col"><?= __('id') ?></th>
                            <th scope="col"><?= __('firstname') ?></th>
                            <th scope="col"><?= __('lastname') ?></th>
                            <th scope="col"><?= __('email') ?></th>
                            <th scope="col"><?= __('created') ?></th>
                            <th scope="col"><?= __('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($group->users as $user): ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><?= h($user->firstname) ?></td>
                                <td><?= h($user->lastname) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->created) ?></td>
                                <td><?= h($user->modified) ?></td>
                                <td>
                                    <a class="dropdown-button" href="#" data-activates="action_<?= $user->id ?>"><i class="material-icons">more_vert</i></a>
                                    <ul id="action_<?= $user->id ?>" class="dropdown-content">
                                        <li><?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $user->id]) ?></li>
                                        <li><?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->id]) ?></li>
                                        <li class="divider"></li>
                                        <li><?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
