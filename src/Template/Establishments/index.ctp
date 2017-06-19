<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?= __('List') ?></span>
                <table class="responsive-table bordered">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('academicyear_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('gmapid') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($establishments as $establishment): ?>
                        <tr>
                            <td><?= $this->Number->format($establishment->id) ?></td>
                            <td><?= $establishment->has('academicyear') ? $this->Html->link($establishment->academicyear->id, ['controller' => 'Academicyears', 'action' => 'view', $establishment->academicyear->id]) : '' ?></td>
                            <td><?= h($establishment->name) ?></td>
                            <td><?= h($establishment->gmapid) ?></td>
                            <td><?= h($establishment->created) ?></td>
                            <td><?= h($establishment->modified) ?></td>
                            <td>
                                <a class="dropdown-button" href="#" data-activates="action_<?= $establishment->id ?>"><i class="material-icons">more_vert</i></a>
                                <ul id="action_<?= $establishment->id ?>" class="dropdown-content">
                                    <li><?= $this->Html->link('<i class="material-icons">remove_red_eye</i>'.__('View'), ['action' => 'view', $establishment->id], ['escape' => false]) ?></li>
                                    <li><?= $this->Html->link('<i class="material-icons">mode_edit</i>'.__('Edit'), ['action' => 'edit', $establishment->id], ['escape' => false]) ?></li>
                                    <li class="divider"></li>
                                    <li><?= $this->Form->postLink('<i class="material-icons">delete_forever</i>'.__('Delete'), ['action' => 'delete', $establishment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $establishment->id), 'escape' => false]) ?></li>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <?= $this->Paginator->prev('<i class="material-icons">chevron_left</i>', ['escape' => false, 'class' => 'waves-effect']) ?>
                    <?= $this->Paginator->numbers(['class' => 'waves-effect']) ?>
                    <?= $this->Paginator->next('<i class="material-icons">chevron_right</i>', ['escape' => false, 'class' => 'waves-effect'])  ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

            </div>
        </div>
    </div>
</div>
