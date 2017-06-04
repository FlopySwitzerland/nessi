<p>Hello,</p>

<p>You — or someone pretending to be you — requested a password reset for your Nessi account.</p>

<p>You can set your new password by following this <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'reset', 'prefix' => false, 'plugin' => false, 'xxb'.$token.'bxx'], ['fullBase' => true]) ?>">link</a>.</p>

<p>If you don't want to reset your password, simply ignore this email and it will stay unchanged.</p>

<p>Sincerely,<br>
    The Nessi support team.</p>
