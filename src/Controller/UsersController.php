<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

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
        $this->Auth->allow(['register', 'forgot', 'reset']);
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

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'updatePassword']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The password was successfully changed'));
            }else{
                $this->Flash->error(__('The password have to be at least 8 characters!'));
            }
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'settings']);
    }

    /**
     * updateProfile
     * @return \Cake\Http\Response|null
     */
    public function updateProfile(){
        $id = $this->Auth->User('id');
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
            }else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

        }
        return $this->redirect(['controller' => 'Users', 'action' => 'settings']);
    }

    /**
     * profilePicture
     *
     */
    public function profilePicture(){

    }


    public function forgot(){
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $emailaddress = $this->request->getData('email');
            if($this->Users->exists(['email' => $emailaddress])){
                $token = $this->__uniqueCode();
                $user = $this->Users->query()
                    ->update()
                    ->set(['token' => $token])
                    ->set(['token_expiration' => Time::now()->addDay()])
                    ->where(['email' => $emailaddress])
                    ->execute();

                $mail = new Email('default');
                $mail->setTemplate('forgot')
                    ->setLayout('default')
                    ->setEmailFormat('html')
                    ->setTo($emailaddress)
                    ->setSubject('Nessi Password Reset')
                    ->setViewVars(['token' => $token]);

                if($mail->send()){
                    $this->Flash->success(__('Please check your email for instructions.'));
                    return $this->redirect(['action' => 'login']);
                }


            }
        }
    }

    /**
     * reset
     */
    public function reset($code){
        $this->viewBuilder()->setLayout('login');

            if(substr($code, 0, 3) == 'xxb' && substr($code, -3, 3) == 'bxx'){
                $user = $this->Users->find()
                    ->where(['token' => substr($code, 3, -3)]);

                if($user->count() == 1){
                    $udata = $user->first();

                    if($udata->token_expiration->isWithinNext(1)){

                        if ($this->request->is('post')) {
                            $udata->token = null;
                            $udata->token_expiration = null;
                            $user = $this->Users->patchEntity($udata, $this->request->getData(), ['validate' => 'updatePassword']);
                            if ($this->Users->save($user)) {
                                $this->Flash->success(__('The password was successfully changed'));
                                return $this->redirect(['action' => 'login']);
                            }else{
                                $this->Flash->error(__('The password have to be at least 8 characters!'));
                            }
                        }
                        $this->set(compact('udata'));


                    }else{
                        $this->Flash->error(__('Token Expired'));
                        return $this->redirect(['action' => 'forgot']);
                    }

                }else{
                    $this->Flash->error(__('Invalid Token'));
                    return $this->redirect(['action' => 'login']);
                }

            }else{
                $this->Flash->error(__('Invalid Token Length'));
                return $this->redirect(['action' => 'login']);
            }






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


    /**
     * __uniqueCode
     * Generate a unique code based on the timestamp
     *
     * @param int $length
     * @return string
     */
    private function __uniqueCode($length = 42){
        $tokens = $this->Users->find('list',['keyField' => 'id', 'valueField' => 'token'])->toArray();
        do{
            $return = bin2hex(openssl_random_pseudo_bytes($length));
        }while(in_array($return , $tokens));

        return $return;
    }
}