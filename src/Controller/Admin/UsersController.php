<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AdminAppController
{

    /**
     * beforeFilter
     *
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

    /**
     * index
     *
     */
    public function index()
    {
        $users = $this->paginate($this->Users, [
            'contain' => ['Groups']
        ]);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * view
     *
     * @param $id
     */
    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setTemplate('add');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list');

        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user', 'groups']);
    }

    /**
     * add
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set('user', $user);
    }

}