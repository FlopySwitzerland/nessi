<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;

/**
 * Subjects Controller
 *
 * @property \App\Model\Table\SubjectsTable $Subjects
 *
 * @method \App\Model\Entity\Subject[] paginate($object = null, array $settings = [])
 */
class SubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SchoolClasses']
        ];
        $subjects = $this->paginate($this->Subjects);

        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['SchoolClasses', 'Terms', 'Marks']
        ]);

        $this->set('subject', $subject);
        $this->set('_serialize', ['subject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subject = $this->Subjects->newEntity();
        if ($this->request->is('post')) {
            $subject->user_id = $this->Auth->User('id');
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['controller' => 'schools', 'action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
        }
        $this->redirect(['controller' => 'schools', 'action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Terms', 'SchoolClasses']
        ]);
        if($subject->school_class->user_id == $this->Auth->User('id')){


        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['controller' => 'schools', 'action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
        }
        $schoolClasses = $this->Subjects->SchoolClasses->find('list', ['limit' => 200])->where(['user_id' => $this->Auth->User('id')]);

        $qrySubjects = $this->Subjects
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

        $terms = (new Collection($results['terms']))->combine('id', function ($entity) { return $entity->name." (".$entity->academicyear->start_date->year." - ".$entity->academicyear->end_date->year.")"; });

        $this->set(compact('subject', 'schoolClasses', 'terms'));
        $this->set('_serialize', ['subject']);
        }else{
            $this->Flash->error(__('HEY ! You want to cheat ?'));
            return $this->redirect(['controller' => 'schools', 'action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subject = $this->Subjects->get($id);
        if ($this->Subjects->delete($subject)) {
            $this->Flash->success(__('The subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
