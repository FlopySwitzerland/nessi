<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
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