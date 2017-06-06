<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

//$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

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
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

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
                <h3><?= __d('cake', 'Oops! Something went wrong') ?></h3>
                <p><?= h($message) ?></p>
                <p>Please contact <a href="mailto:support@flopy.ch">support@flopy.ch</a> for more assistance.</p>
            </div>
        </div>
    </div>
</div>
