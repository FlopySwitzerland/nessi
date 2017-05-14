<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Event\Event;

/**
 * Class UsersController
 *
 * @package App\Controller
 */
class UsersController extends AppController
{

    /**
     * beforeFilter
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['register']);
    }

    /**
     * login
     * Sign In the user
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
     * register
     * Sign Up and Sign In the user
     *
     * @return \Cake\Http\Response|null
     *
     * @todo: Better form verification
     */
    public function register()
    {
        $this->viewBuilder()->setLayout('login');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Verify the password
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
            $this->Flash->error(__('The passwords you entered did not match, try again.'));

        }
        $this->set('user', $user);
    }

    /**
     * settings
     * The settings page
     *
     */
    public function settings(){
        $user = $this->Users->get($this->Auth->User('id'));

        $this->set(compact('user'));
    }

    /**
     * changePwd
     *
     */
    public function changePwd(){
        $id = $this->Auth->User('id');
        $user = $this->Users->get($id);
        $results = ['success' => 0, 'msg' => 'Unknown Error'];

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'updatePassword']);
            if ($this->Users->save($user)) {
                $results = ['success' => 1, 'msg' => __('The password was successfully changed')];
            }else{
                $results = ['success' => 0, 'msg' => $user->getErrors()];
            }

        }
        $this->set(compact('results'));
        $this->set('_serialize', ['results']);
    }

    /**
     * profilePicture
     *
     */
    public function profilePicture(){

    }

    /**
     * enableTwoFactor
     * Method to enable Two Factor
     * Generate a new secret when the code was not already generated
     *
     * Return the QRCode and the secret
     *
     */
    public function twoFactor(){
        $id = $this->Auth->User('id');
        $udata = $this->Users->get($id);
        if(empty($udata->secret)){
            $secret = $this->Auth->tfa->createSecret();
            $this->Users->query()
                ->update()
                ->set(['secret' => $secret])
                ->where(['id' => $id])
                ->execute();
        }else{
            $secret = $udata->secret;
        }


        $this->set('secretDataLink', $this->Auth->tfa->getQRText('Nessi', $secret));
        $this->set('secretDataUri', $this->Auth->tfa->getQRCodeImageAsDataUri('Nessi', $secret));
        $this->set('secret', $secret);
    }

    /**
     * newTwoFactor
     * Generate a new secret code
     *
     */
    public function newTwoFactor(){
        $id = $this->Auth->User('id');

        $secret = $this->Auth->tfa->createSecret();
        $this->Users->query()
            ->update()
            ->set(['secret' => $secret])
            ->where(['id' => $id])
            ->execute();

        $this->set('results', ['secret' => $secret, 'secretDataUri' => $this->Auth->tfa->getQRCodeImageAsDataUri('Nessi', $secret)]);
    }

    /**
     * disableTwoFactor
     * Method to disable Two Factor
     * For security reason, work only by POST method
     *
     * @return \Cake\Http\Response|null
     */
    public function disableTwoFactor()
    {
        $this->request->allowMethod(['post']);
        $id = $this->Auth->User('id');

        $qry = $this->Users->query();
        $qry->update()
            ->set(['secret' => null])
            ->where(['id' => $id]);

        if($qry->execute()){
            $this->Flash->success(__('Two Factor has been disable.'));
        } else {
            $this->Flash->error(__('Two Factor could not be disable. Please, try again.'));
        }

        return $this->redirect(['action' => 'settings']);
    }

    /**
     * logout
     * Sign out the user
     *
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}