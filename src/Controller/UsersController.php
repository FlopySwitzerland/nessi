<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    /** API */

    /**
     * add
     * @return mixed
     */
    public function add()
    {
        if ($this->request->is('POST')) {
            // TODO: Regarder pourquoi ça ne fonctionne pas
            $this->RequestHandler->renderAs($this, 'json');
            $this->response->type('application/json');

            $this->request->data = $this->request->input('json_decode', true);

            $user = $this->Users->patchEntity($this->Users->newEntity(), $this->request->getData());
            if ($this->Users->save($user)) {
                $this->set('data', [
                    'id' => $user->id,
                    'token' => JWT::encode(
                        [
                            'sub' => $user->id,
                            'exp' => time() + 604800
                        ],
                        Security::salt()),
                    '_serialize' => ['id', 'token']
                ]);
            } else {
                $error = $user->getErrors();

              if(isset($error['password']['_required'])) {
                    // Empty password
                    $code = 320;
                    $msg = 'required_password';
                }elseif(isset($error['email']['_required'])) {
                    // Empty mail
                    $code = 330;
                    $msg = 'required_email';
                }elseif(isset($error['email']['_isUnique'])) {
                    // Conflict email
                    $code = 331;
                    $msg = 'conflict_email';
                }elseif(isset($error['email']['email'])) {
                    // Invalid email
                    $code = 332;
                    $msg = 'invalid_email';
                }elseif(isset($error['firstname']['_required'])) {
                    // Empty firstname
                    $code = 340;
                    $msg = 'required_firstname';
                }elseif(isset($error['firstname']['custom'])) {
                    // Invalid firstname
                    $code = 342;
                    $msg = 'invalid_firstname';
                }elseif(isset($error['lastname']['_required'])) {
                    // Empty lastname
                    $code = 350;
                    $msg = 'required_lastname';
                }elseif(isset($error['lastname']['custom'])) {
                    // Invalid lastname
                    $code = 352;
                    $msg = 'invalid_lastname';
                }else{
                    // Unknow error
                    $code = 300;
                    $msg = 'unknow_error';
                }

             /*   $this->response->getStatusCode(400);
                $this->set([
                    'code' => $code,
                    'error' => $msg
                ]);*/
                throw new BadRequestException($msg);
            }
        }else{
            throw new InternalErrorException('Only POST request are accepted');
        }
    }


    public function token()
    {
        $this->RequestHandler->renderAs($this, 'json');
        $this->response->type('application/json');

        $this->request->data = $this->request->input('json_decode', true);
        $user = $this->Auth->identify();
       if (!$user) {
            throw new UnauthorizedException('Invalid email or password');
        }

        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' =>  time() + 604800
                ],
                    Security::salt())
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

}
