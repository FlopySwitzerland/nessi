<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?= $this->Form->create($mark) ?>

<?php
$k = 0;

foreach ($subjects as $schoolclassname => $schoolclass) { ?>
<div class="card">
    <div class="card-content">
        <span class="card-title"><?= $schoolclassname ?></span>
        <table>
            <tbody>
            <?php foreach ($schoolclass as $subject){
                echo '<tr>';
                echo '<td style="width: 20%">'.$subject->name.'</td>';
                for ($i = 0; $i < 10; $i++) {
                    echo '<td style="width: 5%">'.$this->Form->control($k.$i.'.value', ['label' => false]).$this->Form->hidden($k.$i.'.subject_id', ['value' => $subject->id]).'</td>';
                }
                echo '</tr>';
                $k++;
            } ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
