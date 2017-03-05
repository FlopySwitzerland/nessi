<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Database\Type;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\I18n\Number;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                    ]
                ],
                'ADmad/JwtAuth.Jwt' => [
                    'parameter' => 'token',
                    'userModel' => 'Users',
                    'scope' => ['Users.active' => 1],
                    'fields' => [
                        'username' => 'id'
                    ],
                    'queryDatasource' => true
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize'
        ]);
        /*
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                    ]
                ]
            ],
            'loginAction' => [
                'prefix' => false,
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'prefix' => false,
                'plugin' => false,
                'controller' => 'Pages',
                'action' => 'home'
            ],
            'logoutRedirect' => [
                'prefix' => false,
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false
            ],
            //'authError' => 'Vous n\'avez pas les autorisations nécéssaire pour accéder à cette page.',
            'flash' => [
                'element' => 'warning'
            ]
        ]);
*/
        // Configuration I18N
        //I18n::locale(APP_DEFAULT_LOCALE);
       // Type::build('datetime')->useLocaleParser()->setLocaleFormat(APP_ICU_DATE_FORMAT);

        Number::config('fr-CH', \NumberFormatter::CURRENCY, [
            'before' => '',
            'after' => '',
            'zero' => '-',
            'places' => 2,
            'precision' => 2,
            'locale' => 'fr_CH',
            'fractionSymbol' => '.-',
            'fractionPosition' => 'after',
            'pattern' => '#,##0.00'
        ]);
        Number::defaultCurrency('CHF');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if($this->request->is('ajax')){
            $this->RequestHandler->renderAs($this, 'json');
            $this->response->type('application/json');
        }

        if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
            $this->set('_serialize', true);
        }

        /*$this->response->header('Access-Control-Allow-Origin', 'http://localhost:4200');
        $this->response->header('Access-Control-Allow-Headers', 'origin, x-requested-with, content-type, Authorization');
        $this->response->header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');*/
    }

    public function beforeFilter(Event $event)
    {
        if($this->request->is("options")){
            // Set the headers
            $this->response->withHeader('Access-Control-Allow-Origin','*');
            $this->response->withHeader('Access-Control-Allow-Methods','*');
            $this->response->withHeader('Access-Control-Allow-Headers','Content-Type, Authorization');
        }
        return parent::beforeFilter($event);
    }
}
