<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Newsletters Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \App\Model\Table\ProductsTable $Products
 * @property \App\Model\Table\NewslettersTable $Newsletters
 */
class NewslettersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $newsletters = $this->paginate($this->Newsletters);

        $this->set(compact('newsletters'));
        $this->set('_serialize', ['newsletters']);
    }

    /**
     * View method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsletter = $this->Newsletters->get($id, [
            'contain' => ['Genres']
        ]);

        $this->set('newsletter', $newsletter);
        $this->set('_serialize', ['newsletter']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function customerAdd($order = null)
    {
        $this->loadModel('Orders');
        $this->loadModel('Products');
        $order = $this->Orders->get($order, [
            'contain' => []
        ]);
        $product = $this->Products->get($order->products_id);

        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            $newsletter->set('genre', $product->genre);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $genres = $this->Newsletters->Genres->find('list', ['limit' => 200]);
        $this->set('product', $product);
        $this->set(compact('newsletter', 'genres'));
        $this->set('_serialize', ['newsletter']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $genres = $this->Newsletters->Genres->find('list', ['limit' => 200]);
        $this->set(compact('newsletter', 'genres'));
        $this->set('_serialize', ['newsletter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsletter = $this->Newsletters->get($id, [
            'contain' => ['Genres']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $genres = $this->Newsletters->Genres->find('list', ['limit' => 200]);
        $this->set(compact('newsletter', 'genres'));
        $this->set('_serialize', ['newsletter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsletter = $this->Newsletters->get($id);
        if ($this->Newsletters->delete($newsletter)) {
            $this->Flash->success(__('The newsletter has been deleted.'));
        } else {
            $this->Flash->error(__('The newsletter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
