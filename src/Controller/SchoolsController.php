<?php
/**
 * @project nessi
 * @author Raphaël Gabriel
 * @copyright  2017 MOB
 */

namespace App\Controller;


use Cake\ORM\TableRegistry;

class SchoolsController extends AppController
{

    public function index(){
        $tblschoolClasses = TableRegistry::get('SchoolClasses');
        $schoolClasses = $tblschoolClasses
            ->find()
            ->contain(['Subjects', 'Establishments'])
            ->where(['user_id' => $this->Auth->User('id')]);

        $this->set(compact('schoolClasses'));
        $this->set('_serialize', ['schoolClasses']);
    }
}