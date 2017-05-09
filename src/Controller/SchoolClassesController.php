<?php
namespace App\Controller;

use App\Controller\AppController;
use Aura\Intl\Exception;

/**
 * Schoolclasses Controller
 *
 * @property \App\Model\Table\SchoolclassesTable $Schoolclasses
 */
class SchoolclassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Establishments']
        ];
        $Schoolclasses = $this->paginate($this->Schoolclasses);

        $this->set(compact('Schoolclasses'));
        $this->set('_serialize', ['Schoolclasses']);
    }

    /**
     * View method
     *
     * @param string|null $id School Class id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schoolClass = $this->Schoolclasses->get($id, [
            'contain' => ['Establishments', 'Subjects', 'Users']
        ]);

        $this->set('schoolClass', $schoolClass);
        $this->set('_serialize', ['schoolClass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schoolClass = $this->Schoolclasses->newEntity();
        if ($this->request->is('post')) {
            $jsonData =  $this->request->input('json_decode');
            $schoolClass->user_id = $this->Auth->user('id');
            $schoolClass->establishment_id = 1;
            $schoolClass = $this->Schoolclasses->patchEntity($schoolClass, $jsonData);

            try {
                $this->Schoolclasses->save($schoolClass);
                $msg = __('The school class has been saved.');
                $success = true;
            }catch (Exception $e){
                $msg =  __('The school class could not be saved. Please, try again.');
                $success = false;
            }

        }
        $this->set(compact('success', 'msg'));
        $this->set('_serialize', ['success', 'msg']);
    }

    /**
     * Edit method
     *
     * @param string|null $id School Class id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schoolClass = $this->Schoolclasses->get($id, [
            'contain' => ['Branches', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schoolClass = $this->Schoolclasses->patchEntity($schoolClass, $this->request->getData());
            if ($this->Schoolclasses->save($schoolClass)) {
                $this->Flash->success(__('The school class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school class could not be saved. Please, try again.'));
        }
        $establishments = $this->Schoolclasses->Establishments->find('list', ['limit' => 200]);
        $branches = $this->Schoolclasses->Branches->find('list', ['limit' => 200]);
        $users = $this->Schoolclasses->Users->find('list', ['limit' => 200]);
        $this->set(compact('schoolClass', 'establishments', 'branches', 'users'));
        $this->set('_serialize', ['schoolClass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id School Class id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schoolClass = $this->Schoolclasses->get($id);
        if ($this->Schoolclasses->delete($schoolClass)) {
            $this->Flash->success(__('The school class has been deleted.'));
        } else {
            $this->Flash->error(__('The school class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
