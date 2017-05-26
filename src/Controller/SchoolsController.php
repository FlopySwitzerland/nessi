<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 MOB
 */

namespace App\Controller;


use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;

/**
 * Class SchoolsController
 *
 * @package App\Controller
 */
class SchoolsController extends AppController
{
    /**
     * index
     */
    public function index(){
        $tblschoolClasses = TableRegistry::get('SchoolClasses');
        $schoolClasses = $tblschoolClasses
            ->find()
            ->contain(['Subjects', 'Establishments'])
            ->where(['user_id' => $this->Auth->User('id')]);



        $tblSubjects = TableRegistry::get('Subjects');
        $qrySubjects = $tblSubjects
            ->find()
            ->contain([
                'SchoolClasses',
                'Terms',
                'Terms.Academicyears'
            ])
            ->where([
                'SchoolClasses.user_id' => $this->Auth->User('id')
            ]);
        $results = $qrySubjects->first();

        $academicyears = (new Collection($results['terms']))->combine('id', function ($entity) { return $entity; }, function ($entity) { return $entity->academicyear->start_date->year." - ".$entity->academicyear->end_date->year; });

        $this->set(compact('schoolClasses', 'academicyears'));
        $this->set('_serialize', ['schoolClasses']);
    }
}