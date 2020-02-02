<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\ORM\Table\ProductsTable;
use App\Controller\AppController;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;


class Task1Controller extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadModel('products');
    }
    public function index($id = 0)
    {
        $p = TableRegistry::getTableLocator()->get('products');
        $products = $p->find('all', ['contain' => 'ProductRatings'])->toArray();

        // echo '<pre>';
        // print_r($products);
        // echo '</pre>';
        $this->set('products', $products);
        // debug($products[0]->product_ratings[0]->score);
    }
    public function add()
    {
        $products_table = TableRegistry::get('products');
        $products = $products_table->newEntity();

        if ($this->request->is('post')) {
            $products = $products_table->patchEntity($products, $this->request->getData());
            $products->created = date('Y-m-d H:i:s');
            $products->modified = date('Y-m-d H:i:s');
            //Check if image has been uploaded

            if (!empty($this->request->getData()['photo']['name'])) {

                $file = $this->request->getData();

                $ext = substr(strtolower(strrchr($file['photo']['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['photo']['tmp_name'], WWW_ROOT . 'img/' . $file['photo']['name']);

                    //prepare the filename for database entry
                    $products['photo'] = $file['photo']['name'];
                }
            } else {
                $products['photo'] = Null;
            }
            if ($products_table->save($products)) {
                $this->Flash->success('Product Added Successfully', ['key' => 'message']);
                $this->Flash->error((__('Product Added Successfully')));
                return $this->redirect(['action' => 'index']);
            } else
                $this->Flash->error(__('Unable to add your product!'));
        }
        $this->set('post', $products);
    }

    public function view($id = Null)
    {

        //$this->Html->script('Js');
        $products_table = TableRegistry::get('products');
        $products = $products_table->get($id, ['contain' => 'ProductRatings'])->toArray();
        $this->set('products', $products);
    }
    public function edit($id)
    {
        $products_table = TableRegistry::get('products');
        $products = $products_table->get($id);
        $this->set('products', $products);
        if ($this->request->is('post')) {
            $image = $products['photo'];
            $products = $products_table->patchEntity($products, $this->request->getData());
            $products->modified = date('Y-m-d H:i:s');
            //-----------------------------------------------------------------------------
            if (!empty($this->request->getData()['photo']['name'])) {

                $file = $this->request->getData();

                $ext = substr(strtolower(strrchr($file['photo']['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['photo']['tmp_name'], WWW_ROOT . 'img/' . $file['photo']['name']);

                    //prepare the filename for database entry
                    $products['photo'] = $file['photo']['name'];
                }
            } else {
                $products['photo'] = $image;
            }
            //-----------------------------------------------------------------------------

            if ($products_table->save($products)) {
                $this->Flash->success('Product Updated Successfully', ['key' => 'message']);
                return $this->redirect(['action' => 'index']);
            }
            $this->set('products', $products);
        } else {
            $products_table = TableRegistry::get('products')->find();
            $products = $products_table->where(['id' => $id])->first();

            $products->modified = date('Y-m-d H:i:s');
            //-----------------------------------------------------------------------------
            if (!empty($this->request->getData()['photo']['name'])) {

                $file = $this->request->getData();

                $ext = substr(strtolower(strrchr($file['photo']['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['photo']['tmp_name'], WWW_ROOT . 'img/' . $file['photo']['name']);

                    //prepare the filename for database entry
                    $products['photo'] = $file['photo']['name'];
                }
            }
            //-----------------------------------------------------------------------------

            $this->set('name', $products->name);
            $this->set('price', $products->price);
            $this->set('description', $products->description);
            $this->set('modified', $products->modified);
            $this->set('created', $products->created);
            if ($products['photo'] != Null || $products['photo'] != '')
                $this->set('photo', $products['photo']);
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
    public function export()
    {
        $p = TableRegistry::getTableLocator()->get('products');
        $this->response = $this->response->withDownload('my-file.csv');
        $_header = array('ID', 'Name', 'Price', 'Description', 'Photo', 'Modified', 'Created');
        $data = $p->find('all');

        $_serialize = 'data';

        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('data', '_header', '_serialize'));
    }

    function vote($id)
    {
        $products_rating_table = TableRegistry::get('product_ratings');
        $rating = $products_rating_table->newEntity();
        $rating->created = date('Y-m-d H:i:s');
        $this->request->getData();

        //update your number in the database
        if ($products_rating_table->save($rating)) {
            $this->set('message', 'Thank you for voting!');
        } else {
            $this->set('message', 'Try again.');
        }

        //then in vote.ctp, echo $message somewhere
        //the result of vote.ctp will replace #content on your page
    }
}
