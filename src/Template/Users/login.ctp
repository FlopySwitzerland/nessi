        <?= $this->Form->create(); ?>
        <?= $this->Form->input('username', ['label' => false, 'placeholder' => 'Username']); ?>
        <?= $this->Form->input('password', ['type' => 'password', 'label' => false, 'placeholder' => 'Password']); ?>
        <?= $this->Form->submit('Connexion', ['class' => 'btn btn-default btn-block btn-flat']); ?>
        <?= $this->Form->end(); ?>