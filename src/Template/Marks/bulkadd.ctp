<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Form->create($mark) ?>

    <?php
    $k = 0;

    foreach ($subjects as $schoolclassname => $schoolclass){

        echo $schoolclassname;
        echo '<table class="table">';
        foreach ($schoolclass as $subject){
            echo '<tr>';
            echo '<td style="width: 20%">'.$subject->name.$this->Form->hidden($k.'.subject_id', ['value' => $subject->id]).'</td>';
            for ($i = 0; $i <= 10; $i++) {
                echo '<td style="width: 5%">'.$this->Form->control($k.'.'.$i.'.value', ['label' => false]).'</td>';
            }
            echo '</tr>';
            $k++;
        }
        echo '</table>';
    }

    ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
