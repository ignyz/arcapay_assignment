<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table\ProductsTable;
use App\Controller\AppController;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;


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
        $products_table = TableRegistry::get('products');
        $products = $products_table->newEntity();

        if ($this->request->is('post')) {
            $products = $products_table->patchEntity($products, $this->request->getData());

            $products->created = date('Y-m-d H:i:s');
            $products->modified = date('Y-m-d H:i:s');

            if ($products_table->save($products)) {
                $this->Flash->success('Product Added Successfully', ['key' => 'message']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your product!'));
        }
        $this->set('post', $products);
    }

    public function view($id = Null)
    {
        $products_table = TableRegistry::get('products');
        $products = $products_table->get($id);
        $this->set('products', $products);
    }
    public function edit($id)
    {
        $products_table = TableRegistry::get('products');
        $products = $products_table->get($id);
        $this->set('products', $products);
        if ($this->request->is('post')) {
            $products = $products_table->patchEntity($products, $this->request->getData());
            $products->modified = date('Y-m-d H:i:s');
            if ($products_table->save($products)) {
                $this->Flash->success('Product Updated Successfully', ['key' => 'message']);
                return $this->redirect(['action' => 'index']);
            }
            $this->set('products', $products);
        } else {
            $products_table = TableRegistry::get('products')->find();
            $products = $products_table->where(['id' => $id])->first();

            $products->modified = date('Y-m-d H:i:s');

            $this->set('name', $products->name);
            $this->set('price', $products->price);
            $this->set('description', $products->description);
            $this->set('modified', $products->modified);
            $this->set('created', $products->created);
            $this->set('id', $id);
        }
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $products_table = TableRegistry::get('products');
        $product = $products_table->get($id);

        if ($products_table->delete($product)) {

            $this->Flash->success('Product Deleted Successfully', ['key' => 'message']);
            return $this->redirect(['action' => 'index']);
        }
    }
}
