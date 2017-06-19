<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create($academicyear) ?>
<div class="row">

    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Academic years</span>


                <div class="input-field">
                    <?= $this->Form->control('start_date', ['class' => 'datepicker', 'type' => 'text']) ?>
                </div>
                <div class="input-field">
                    <?= $this->Form->control('end_date', ['class' => 'datepicker', 'type' => 'text']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Terms</span>

                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">add</i>New term</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="input-field col s12">
                                    <?= $this->Form->control('terms.name', ['type' => 'text']) ?>
                                </div>
                                <div class="input-field col s6">
                                    <?= $this->Form->control('terms.start_date', ['class' => 'datepicker', 'type' => 'text']) ?>
                                </div>
                                <div class="input-field col s6">
                                    <?= $this->Form->control('terms.end_date', ['class' => 'datepicker', 'type' => 'text']) ?>
                                </div>
                                <div class="col s12">
                                    <button class="waves-effect waves-light btn teal" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <?= $this->Form->button(__('Submit')) ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m4 offset-m4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Help</span>

                <h5>What Are Academic Years?</h5>
                <p>An academic year is used to represent your school year, from your first day to the last.</p>

                <div class="divider"></div>

                <h5>What Are Terms?</h5>
                <p>A term is used to represent any terms (eg. semesters, trimesters, quarters) that you may have.</p>

            </div>
        </div>
    </div>

</div>
<?= $this->Form->end() ?>

