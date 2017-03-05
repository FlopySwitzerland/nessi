<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<CakePHPBakeOpenTagphp
/**
  * @var \<?= $namespace ?>\View\AppView $this
  */
CakePHPBakeCloseTag>
<div class="<?= $pluralVar ?> form">
<CakePHPBakeOpenTag= $this->Flash->render('auth') CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Form->create() CakePHPBakeCloseTag>
    <fieldset>
        <legend><CakePHPBakeOpenTag= __('Please enter your username and password') CakePHPBakeCloseTag></legend>
        <CakePHPBakeOpenTag= $this->Form->control('username') CakePHPBakeCloseTag>
        <CakePHPBakeOpenTag= $this->Form->control('password') CakePHPBakeCloseTag>
    </fieldset>
    <CakePHPBakeOpenTag= $this->Form->button(__('Login')); CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
</div>
