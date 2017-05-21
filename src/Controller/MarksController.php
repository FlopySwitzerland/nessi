<?php
namespace App\Controller;

use App\Controller\AppController;
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
        $schoolClasses = $tblSchoolClasses
            ->find()
            ->contain(['Subjects' => ['Marks', 'Terms' => 'Academicyears'], 'Establishments'])
            ->where(['user_id' => $this->Auth->User('id')]);

        $subjects = $tblSubjects
            ->find()
            ->contain(['SchoolClasses'])
            ->where(['user_id' => $this->Auth->User('id')])
            ->combine('id', 'name', 'school_class.name');

        $terms = $tblTerms
            ->find();

        $maxMarksCount = $tblSubjects->find()->max('marks_count')->marks_count;

        $this->set(compact('schoolClasses', 'subjects', 'maxMarksCount', 'terms'));
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
        $mark = $this->Marks->newEntity();
        if ($this->request->is('post')) {
            $mark = $this->Marks->patchEntity($mark, $this->request->getData());
            if ($this->Marks->save($mark)) {
                $this->Flash->success(__('The mark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mark could not be saved. Please, try again.'));
        }
        $this->set(compact('mark'));
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
