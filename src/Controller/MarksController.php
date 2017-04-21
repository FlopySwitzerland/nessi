<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Marks Controller
 *
 * @property \App\Model\Table\MarksTable $Marks
 */
class MarksController extends ApiController
{


    public function find($type = "all", $render = "json"){
        $this->apiSearch('Marks', $type, $render);
    }


    public function getMarks($render){
        $tblSchoolClasses = TableRegistry::get('SchoolClasses');
        $tblBranches = TableRegistry::get('Branches');

        $userId = $this->Auth->user('id');
        if(in_array($render, ['xml', 'json', 'jsonp'])) {
            if ($render == 'jsonp') {
                $this->set(['_jsonp' => true]);
                $render = 'json';
            }
        }else{
            $render = 'json';
        }

        try{
            $results = $tblBranches->find()
                ->select(['Branches.name', 'Branches.img', 'marks_count'])
                ->matching('SchoolClasses.Users', function(\Cake\ORM\Query $q) {
                    return $q->where(['Users.id' => 3]);
                });
        }catch (\Exception $e){
            $this->response->withStatus(500, 'Unable to find the marks with the current filter');
        }

        $this->RequestHandler->renderAs($this, $render);
        $this->response->type('application/'.$render);
        $this->set(['results' => $results->toArray(), '_serialize' => ['results']]);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Branches']
        ];
        $marks = $this->paginate($this->Marks);

        $this->set(compact('marks'));
        $this->set('_serialize', ['marks']);
    }

    /**
     * View method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mark = $this->Marks->get($id, [
            'contain' => ['Branches']
        ]);

        $this->set('mark', $mark);
        $this->set('_serialize', ['mark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mark = $this->Marks->newEntity();
        if ($this->request->is('post')) {
            $mark = $this->Marks->patchEntity($mark, $this->request->getData());
            if ($this->Marks->save($mark)) {
                $this->Flash->success(__('The mark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mark could not be saved. Please, try again.'));
        }
        $branches = $this->Marks->Branches->find('list', ['limit' => 200]);
        $this->set(compact('mark', 'branches'));
        $this->set('_serialize', ['mark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
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
        $branches = $this->Marks->Branches->find('list', ['limit' => 200]);
        $this->set(compact('mark', 'branches'));
        $this->set('_serialize', ['mark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Network\Response|null Redirects to index.
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
