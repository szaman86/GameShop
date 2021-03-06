<?php
namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \App\Model\Table\CustomersTable $Customers
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Customers']
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Products', 'Customers']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products', 'customers'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function customerAdd($productId)
    {

        $product = $this->Orders->Products->get($productId);
        $order = $this->Orders->newEntity();
        $order->set('products_id', $productId);
        $productQuantity = $product->get('quantity');
        $product->setQuantity(--$productQuantity);
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);

            if ($this->Orders->save($order)) {

                $product->set('quantity', $productQuantity);
                $this->Flash->success(__('The order has been saved.'));
                if ($this->request->data['newsletter']) {
                    return $this->redirect(
                        ['controller' => 'Newsletters', 'action' => 'customerAdd', $order->get('id')]
                    );
                } else {
                    return $this->redirect(
                        ['controller' => 'Genres', 'action' => 'customIndex']
                    );
                }
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }

        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $this->set('product', $product);
        $this->set('customers', $customers);
        $this->set(compact('order', 'customers'));
        $this->set('_serialize', ['order']);
    }

    public function buyNow($productId)
    {
        $product = $this->Orders->Products->get($productId);
        $order = $this->Orders->newEntity();
        $order->set('products_id', $productId);
        $productQuantity = $product->get('quantity');
        $product->setQuantity(--$productQuantity);
        if ($this->request->is('post')) {
            $email = $this->request->data['customer_email'];
            $customer = $this->Orders->Customers
                ->find('all', array(
                    'conditions' => array('email' => $email)
                ))
                ->execute()
                ->fetch('assoc');
            if (!$customer) {
                $customer = $this->Orders->Customers->newEntity();
                $customer->set('email', $email);
                $this->Orders->Customers->save($customer);
                $customer->set('persisted', true);
                $customer->toArray();
            } else {
                //Prepare array to pass to the order
                $customer['id'] =  $customer['Customers__id'];
                $customer['persisted'] = false;
            }
            $order->set('customers_id', $customer['id']);
            if ($this->Orders->save($order)) {
                $product->set('quantity', $productQuantity);
                $this->Flash->success(__('The order has been saved.'));
                if ($customer['persisted']) {
                    return $this->redirect(
                        ['controller' => 'Customers', 'action' => 'customerEdit', $customer->id]
                    );
                } else {
                    return $this->redirect(
                        ['controller' => 'Genres', 'action' => 'customIndex']
                    );
                }
            }
        }
        $this->set('product', $product);
        $this->set(compact('order', 'customers'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products', 'customers'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
