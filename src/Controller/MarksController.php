<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

/**
 * Marks Controller
 *
 * @property \App\Model\Table\MarksTable $Marks
 *
 * @method \App\Model\Entity\Mark[] paginate($object = null, array $settings = [])
 */
class MarksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $tblSchoolClasses = TableRegistry::get('SchoolClasses');
        $tblSubjects = TableRegistry::get('Subjects');
        $tblTerms = TableRegistry::get('Terms');
        $tblAcademicyears = TableRegistry::get('Academicyears');
        $tblEstablishments = TableRegistry::get('Establishments');

       /* $schoolClasses = $tblSchoolClasses
            ->find()
            ->contain(['Subjects' => ['Marks', 'Terms' => 'Academicyears'], 'Establishments'])
            ->where(['user_id' => $this->Auth->User('id')]);
*/
        $listsubjects = $tblSubjects
            ->find()
            ->contain(['SchoolClasses', 'Terms'])
            ->where(['user_id' => $this->Auth->User('id')])
            ->combine('id', 'name', 'school_class.name')
            ->toArray();

     /*   $qryTerms = $tblSubjects
            ->find()
            ->contain([
                'SchoolClasses',
                'Terms',
                'Terms.Academicyears'
            ])
            ->where([
                'SchoolClasses.user_id' => $this->Auth->User('id')
            ])->first();
*/

        $qry = $tblAcademicyears->find();
        $acyears = $qry
            ->contain(['Terms' => ['Subjects' => ['SchoolClasses'], 'Marks']])
            ->where(['user_id' => $this->Auth->User('id')]);

        $academicyears = $acyears->orderDesc('end_date')->extract(function ($entity) { return $entity->start_date->year." - ".$entity->end_date->year; })->toArray();

        $establishments = $tblEstablishments
            ->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();


      //  $academicyears = (new Collection($qryTerms['terms']))->combine('id', 'name', function ($entity) { return $entity->academicyear->start_date->year." - ".$entity->academicyear->end_date->year; });


        $this->set(compact('listsubjects', 'acyears', 'academicyears', 'establishments'));
        $this->set('_serialize', ['schoolClasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mark = $this->Marks->get($id, [
            'contain' => ['Subjects']
        ]);

        $this->set('mark', $mark);
        $this->set('_serialize', ['mark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblSubjects = TableRegistry::get('Subjects');

        $mark = $this->Marks->newEntity();
        if ($this->request->is('post')) {
            $mark = $this->Marks->patchEntity($mark, $this->request->getData());
            if ($this->Marks->save($mark)) {
                $this->Flash->success(__('The mark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mark could not be saved. Please, try again.'));
        }
        $listsubjects = $tblSubjects
            ->find()
            ->contain(['SchoolClasses', 'Terms'])
            ->where(['user_id' => $this->Auth->User('id')])
            ->combine('id', 'name', 'school_class.name')
            ->toArray();
        $this->set(compact('mark', 'listsubjects'));
        $this->set('_serialize', ['mark']);
    }

    /**
     * bulkadd
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function bulkadd()
    {
        $tblSubjects = TableRegistry::get('Subjects');
        $mark = $this->Marks->newEntity();
        if ($this->request->is('post')) {
            $mark = $this->Marks->patchEntity($mark, $this->request->getData());
            if ($this->Marks->save($mark)) {
                $this->Flash->success(__('The mark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mark could not be saved. Please, try again.'));
        }
        $subjects = $tblSubjects
            ->find()
            ->contain(['SchoolClasses', 'Terms'])
            ->where(['user_id' => $this->Auth->User('id')])
            ->groupBy('school_class.name')
            ->toArray();
        $this->set(compact('mark', 'subjects'));
        $this->set('_serialize', ['mark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mark = $this->Marks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mark = $this->Marks->patchEntity($mark, $this->request->getData());
            if ($this->Marks->save($mark)) {
                $this->Flash->success(__('The mark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mark could not be saved. Please, try again.'));
        }
        $subjects = $this->Marks->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('mark', 'subjects'));
        $this->set('_serialize', ['mark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mark = $this->Marks->get($id);
        if ($this->Marks->delete($mark)) {
            $this->Flash->success(__('The mark has been deleted.'));
        } else {
            $this->Flash->error(__('The mark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
