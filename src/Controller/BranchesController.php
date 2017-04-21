<?php
/**
 * Projet : nessi-api
 * Auteur : Raphaël Gabriel
 * Date: 21.04.2017
 */

namespace App\Controller;


use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class BranchesController extends ApiController
{

    /**
     * getBranches
     * @param $render
     */
    public function getBranches($render){
        // Retrieve the current user id
        $userId = $this->Auth->user('id');

        try{
            $results = $this->Branches->find()
                ->select(['Branches.name', 'Branches.img', 'marks_count', 'SchoolClasses.name'])
                ->matching('SchoolClasses.Users', function(Query $q) use ($userId) {
                    return $q->where(['Users.id' => $userId]);
                });
        }catch (\Exception $e){
            $this->response->withStatus(500, 'Unable to find the branches for the current user');
        }

        $this->set(['results' => $results->toArray(), '_serialize' => ['results']]);
    }

}