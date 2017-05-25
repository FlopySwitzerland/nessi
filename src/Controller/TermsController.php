<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Terms Controller
 *
 * @property \App\Model\Table\TermsTable $Terms
 *
 * @method \App\Model\Entity\Term[] paginate($object = null, array $settings = [])
 */
class TermsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Academicyears']
        ];
        $terms = $this->paginate($this->Terms);

        $this->set(compact('terms'));
        $this->set('_serialize', ['terms']);
    }

    /**
     * list
     */
    public function list($subject_id){
        $establishments = $this->Terms
            ->find()
            ->select(['id' => 'id', 'text' => 'name']);

        $this->set(compact('establishments'));
        $this->set('_serialize', ['establishments']);
    }

    /**
     * View method
     *
     * @param string|null $id Term id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $term = $this->Terms->get($id, [
            'contain' => ['Academicyears', 'Subjects', 'Marks']
        ]);

        $this->set('term', $term);
        $this->set('_serialize', ['term']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $term = $this->Terms->newEntity();
        if ($this->request->is('post')) {
            $term = $this->Terms->patchEntity($term, $this->request->getData());
            if ($this->Terms->save($term)) {
                $this->Flash->success(__('The term has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The term could not be saved. Please, try again.'));
        }
        $academicyears = $this->Terms->Academicyears->find('list', ['limit' => 200]);
        $subjects = $this->Terms->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('term', 'academicyears', 'subjects'));
        $this->set('_serialize', ['term']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Term id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $term = $this->Terms->get($id, [
            'contain' => ['Subjects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $term = $this->Terms->patchEntity($term, $this->request->getData());
            if ($this->Terms->save($term)) {
                $this->Flash->success(__('The term has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The term could not be saved. Please, try again.'));
        }
        $academicyears = $this->Terms->Academicyears->find('list', ['limit' => 200]);
        $subjects = $this->Terms->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('term', 'academicyears', 'subjects'));
        $this->set('_serialize', ['term']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Term id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $term = $this->Terms->get($id);
        if ($this->Terms->delete($term)) {
            $this->Flash->success(__('The term has been deleted.'));
        } else {
            $this->Flash->error(__('The term could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
