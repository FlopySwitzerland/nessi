<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SchoolClasses Controller
 *
 * @property \App\Model\Table\SchoolClassesTable $SchoolClasses
 *
 * @method \App\Model\Entity\SchoolClass[] paginate($object = null, array $settings = [])
 */
class SchoolClassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Establishments', 'Users']
        ];
        $schoolClasses = $this->paginate($this->SchoolClasses);

        $this->set(compact('schoolClasses'));
        $this->set('_serialize', ['schoolClasses']);
    }

    /**
     * View method
     *
     * @param string|null $id School Class id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schoolClass = $this->SchoolClasses->get($id, [
            'contain' => ['Establishments', 'Users', 'Subjects']
        ]);

        $this->set('schoolClass', $schoolClass);
        $this->set('_serialize', ['schoolClass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schoolClass = $this->SchoolClasses->newEntity();
        if ($this->request->is('post')) {
            $schoolClass->user_id = $this->Auth->User('id');
            $schoolClass = $this->SchoolClasses->patchEntity($schoolClass, $this->request->getData());
            if ($this->SchoolClasses->save($schoolClass)) {
                $this->Flash->success(__('The school class has been saved.'));

                return $this->redirect(['controller' => 'schools', 'action' => 'index']);
            }
            $this->Flash->error(__('The school class could not be saved. Please, try again.'));
        }
        $this->redirect(['controller' => 'schools', 'action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id School Class id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schoolClass = $this->SchoolClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schoolClass = $this->SchoolClasses->patchEntity($schoolClass, $this->request->getData());
            if ($this->SchoolClasses->save($schoolClass)) {
                $this->Flash->success(__('The school class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school class could not be saved. Please, try again.'));
        }
        $establishments = $this->SchoolClasses->Establishments->find('list', ['limit' => 200]);
        $users = $this->SchoolClasses->Users->find('list', ['limit' => 200]);
        $this->set(compact('schoolClass', 'establishments', 'users'));
        $this->set('_serialize', ['schoolClass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id School Class id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schoolClass = $this->SchoolClasses->get($id);
        if ($this->SchoolClasses->delete($schoolClass)) {
            $this->Flash->success(__('The school class has been deleted.'));
        } else {
            $this->Flash->error(__('The school class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
