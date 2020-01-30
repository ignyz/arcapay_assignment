<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\View\Exception\MissingTemplateException;


class Task1Controller extends AppController
{

    public function index($id = 0)
    {

        $p = TableRegistry::getTableLocator()->get('products');
        $products = $p->find('all', ['contain' => 'ProductRatings'])->toArray();
        // echo '<pre>';
        // print_r($products);
        // echo '</pre>';

        $this->set('products', $products);
        //debug($a);
    }
    public function add()
    {
        $post = $this->Task1->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Task1->patchEntity($post, $this->request->getData());
            if ($this->Task1->save($post)) {
                $this->Flash->success('Product Added Successfully', ['key' => 'message']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your product!'));
        }
        $this->set('post', $post);
    }
}
