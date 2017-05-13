<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['register']);
    }

    /**
     * login
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('login');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {


            if($this->request->getData('password') == $this->request->getData('confirmPassword')){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->group_id = User::DEFAULT_GROUP;
                if ($this->Users->save($user)) {
                    $this->Flash->success(__("Welcome to nessi ! Happy to see you here !"));
                    $user = $this->Auth->identify();
                    if ($user) {
                        $this->Auth->setUser($user);
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                }
                $this->Flash->error(__('There was errors in the form. Please, try again.'));
            }
            $this->Flash->error(__('The password doesn\'t match. Please, try again.'));

        }
        $this->set('user', $user);
    }
    /**
     * logout
     *
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * enableTwoFactor
     *
     */
    public function enableTwoFactor(){
        $udata = $this->Users->get($this->Auth->User('id'));
        if(empty($udata->secret)){
            $secret = $this->Auth->tfa->createSecret();
        }else{
            $secret = $udata->secret;
        }


        $this->set('secretDataUri', $this->Auth->tfa->getQRCodeImageAsDataUri('Nessi', $secret));
    }

    public function settings(){

    }
}