<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subject Entity
 *
 * @property int $id
 * @property int $school_class_id
 * @property string $name
 * @property string $img
 * @property int $marks_count
 * @property float $avg_round
 * @property float $avg_semester
 * @property int $avg_sup
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\SchoolClass $school_class
 * @property \App\Model\Entity\Mark[] $marks
 * @property \App\Model\Entity\Term[] $terms
 */
class Subject extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];


    /**
     * getAverage
     * Calculate the average for the given subject
     *
     * @param $marks
     * @return float|int|string
     */
    public function getAverage($marks){
        if(!is_null($marks)){
            $avg = array_sum(array_map(function($value) { return $value->value; }, $marks))/ count($marks);

            if($this->avg_round == 0.5){
                $avg_round = round($avg * 2) / 2;
            }elseif($this->avg_round == 0.1){
                $avg_round = round($avg, 1);
            }else{
                $avg_round = round($avg);
            }

            return $avg_round;
        }else{
            return "-";
        }
    }
}
