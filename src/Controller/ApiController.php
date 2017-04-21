<?php
/**
 * Projet : nessi-api
 * Auteur : Raphaël Gabriel
 * Date: 21.04.2017
 */

namespace App\Controller;


use Cake\Event\Event;

class ApiController extends AppController
{
    /**
     * beforeRender
     * @param Event $event
     */
    public function beforeRender(Event $event)
    {
        $render = $this->request->getParam('pass')[0];
        if(in_array($render, ['xml', 'json', 'jsonp'])) {
            if ($render == 'jsonp') {
                $this->set(['_jsonp' => true]);
                $render = 'json';
            }
        }else{
            $render = 'json';
        }

        $this->RequestHandler->renderAs($this, $render);
        $this->response->type('application/'.$render);

        parent::beforeRender($event);
    }


    /**
     * find
     *
     * @param string $type
     */
    public function apiSearch($model, $type, $render, $defaultContain){

        $defaultArguments = ['select' => null, 'limit' => 100, 'page' => 1, 'order' => ['created' => 'ASC'], 'orderasc' => ['created' => 'ASC'], 'orderdesc' => ['modified' => 'DESC']];

        $filters = $this->request->getQueryParams();
        foreach ($defaultArguments as $argument => $defaultvalue) {
            if(!empty($this->request->getQuery($argument))){
                $$argument = explode(",", $this->request->getQuery($argument));
            }else{
                $$argument = $defaultvalue;
            }
        }


        /* Argument RENDER
         * Accepted : xml, json, jsonp
         * Default : json
         * */
        if(in_array($render, ['xml', 'json', 'jsonp'])) {
            if ($render == 'jsonp') {
                $this->set(['_jsonp' => true]);
                $render = 'json';
            }
        }



        if($type == 'list'){
            $typeParams = ['keyField' => 'id', 'valueField' => 'name'];
            $select = [];
        }elseif($type == 'first'){
            $type = "all";
            $limit = 1;
            $typeParams = [];
        }else{
            $typeParams = [];
        }

        try{
            $results = $this->{$model}->find($type, $typeParams)->contain($contain)->select($select)->limit($limit)->page($page)->where($filters)->order($order);
        }catch (\Exception $e){
            $this->response->statusCode(500);
            $this->set([
                'error' => 'error',
                '_serialize' => ['error']
            ]);
        }

        if($results->count() == 0){
            $this->response->statusCode(204);
        }

        $this->RequestHandler->renderAs($this, $render);
        $this->response->type('application/'.$render);
        $this->set(['results' => $results->toArray(), '_serialize' => ['results']]);


    }



}