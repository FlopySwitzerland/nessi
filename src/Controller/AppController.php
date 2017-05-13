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
use Cake\Event\Event;
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
        ]);*/

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
        $this->loadComponent('TwoFactorAuth.Auth', [
            'authenticate' => [
                'TwoFactorAuth.Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password',
                        'secret' => 'secret', // database field
                        'remember' => 'remember' // checkbox form field name for "Trust this device" feature
                    ],
                    'remember' => true, // enable "Trust this device" feature
                    'cookie' => [ // cookie settings for "Trust this device" feature
                        'name' => 'TwoFactorAuth',
                        'httpOnly' => true,
                        'expires' => '+30 days'
                    ]
                ],
            ],
            'TwoFactorAuth' => [
                'remember' => true, // enable "Trust this device" feature
                'cookie' => [ // cookie settings for "Trust this device" feature
                    'name' => 'TwoFactorAuth',
                    'httpOnly' => true,
                    'expires' => '+30 days'
                ],
                'verifyAction' => [
                    'prefix' => false,
                    'controller' => 'TwoFactorAuth',
                    'action' => 'verify',
                    'plugin' => 'TwoFactorAuth'
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
                'controller' => 'Dashboard',
                'action' => 'index'
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
    }

    /**
     * beforeFilter
     *
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('display');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
