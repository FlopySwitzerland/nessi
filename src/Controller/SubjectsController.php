<?php
/**
 * Projet : nessi-api
 * Auteur : Raphaël Gabriel
 * Date: 21.04.2017
 */

namespace App\Controller;


use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class SubjectsController extends ApiController
{

    /**
     * getSubjects
     */
    public function getSubjects(){
        // Retrieve the current user id
        $userId = $this->Auth->user('id');

        try{
            $results = $this->Subjects->find()
                ->select(['Subjects.name', 'Subjects.img', 'marks_count'])
                ->matching('SchoolClasses.Users', function(Query $q) use ($userId) {
                    return $q->where(['Users.id' => $userId]);
                })
                ->matching('SchoolClasses', function(Query $q) {
                    return $q->select(['name']);
                })
                ->matching('SchoolClasses.Establishments', function(Query $q) {
                    return $q->select(['name']);
                })
                ->matching('Terms.Academicyears', function(Query $q) {
                    return $q->select(['start_date']);
                });
        }catch (\Exception $e){
            $this->response->withStatus(500, 'Unable to find the Subjects for the current user');
        }

        $this->set(['results' => $results->toArray(), '_serialize' => ['results']]);
    }

}