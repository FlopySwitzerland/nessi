<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;


if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<div class="row">
    <div class="col m6 offset-m3">
        <div class="row">
            <div class="col m3">
                <h1 style="font-size: 95px"><?= $code ?></h1>
            </div>
            <div class="col m9">
                <h3><?= __d('cake', 'Oops! You\'re not lucky, it\'s a 404') ?></h3>
                <p><?= __d('cake', 'The requested address {0} was not found on this server.', "<b>'{$url}'</b>") ?></p>
                <p>Please contact <a href="mailto:support@flopy.ch">support@flopy.ch</a> for more assistance.</p>
            </div>
        </div>
    </div>
</div>
