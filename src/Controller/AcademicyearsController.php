<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Academicyears Controller
 *
 * @property \App\Model\Table\AcademicyearsTable $Academicyears
 *
 * @method \App\Model\Entity\Academicyear[] paginate($object = null, array $settings = [])
 */
class AcademicyearsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $academicyears = $this->paginate($this->Academicyears);

        $this->set(compact('academicyears'));
        $this->set('_serialize', ['academicyears']);
    }

    /**
     * View method
     *
     * @param string|null $id Academicyear id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $academicyear = $this->Academicyears->get($id, [
            'contain' => ['Terms']
        ]);

        $this->set('academicyear', $academicyear);
        $this->set('_serialize', ['academicyear']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $academicyear = $this->Academicyears->newEntity();
        if ($this->request->is('post')) {
            $academicyear = $this->Academicyears->patchEntity($academicyear, $this->request->getData());
            if ($this->Academicyears->save($academicyear)) {
                $this->Flash->success(__('The academicyear has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The academicyear could not be saved. Please, try again.'));
        }
        $this->set(compact('academicyear'));
        $this->set('_serialize', ['academicyear']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Academicyear id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $academicyear = $this->Academicyears->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $academicyear = $this->Academicyears->patchEntity($academicyear, $this->request->getData());
            if ($this->Academicyears->save($academicyear)) {
                $this->Flash->success(__('The academicyear has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The academicyear could not be saved. Please, try again.'));
        }
        $this->set(compact('academicyear'));
        $this->set('_serialize', ['academicyear']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Academicyear id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $academicyear = $this->Academicyears->get($id);
        if ($this->Academicyears->delete($academicyear)) {
            $this->Flash->success(__('The academicyear has been deleted.'));
        } else {
            $this->Flash->error(__('The academicyear could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
