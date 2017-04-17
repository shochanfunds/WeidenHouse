<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ClientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Paidstatuses', 'Managers', 'Howtopays', 'Projects', 'CommissionAdmits', 'Sexes', 'PayReasons', 'Endclients'],
            'order' => ['Endclients.name ASC']
        ];
        $clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
        $this->set('_serialize', ['clients']);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Paidstatuses', 'Managers', 'Howtopays', 'Projects', 'CommissionAdmits', 'Sexes', 'PayReasons' ,'Endclients']
        ]);

        //とりあえずThumbnail画像を表示する
        $this->loadModel('Clients');
        $thumbnail = $this->Clients->thumbnail();

        $this->set('thumbnail',$thumbnail);
        $this->set('client', $client);
        $this->set('_serialize', ['client']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $paidstatuses = $this->Clients->Paidstatuses->find('list', ['limit' => 200]);
        $managers = $this->Clients->Managers->find('list', ['limit' => 200]);
        $howtopays = $this->Clients->Howtopays->find('list', ['limit' => 200]);
        $projects = $this->Clients->Projects->find('list', ['limit' => 200]);
        $commissionAdmits = $this->Clients->CommissionAdmits->find('list', ['limit' => 200]);
        $sexes = $this->Clients->Sexes->find('list', ['limit' => 200]);
        $payReasons = $this->Clients->PayReasons->find('list', ['limit' => 200]);
        $endclients = $this->Clients->Endclients->find('list' ,['limit' => 200]);
        $this->set(compact('client', 'paidstatuses', 'managers', 'howtopays', 'projects', 'commissionAdmits', 'sexes', 'payReasons', 'endclients'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $paidstatuses = $this->Clients->Paidstatuses->find('list', ['limit' => 200]);
        $managers = $this->Clients->Managers->find('list', ['limit' => 200]);
        $howtopays = $this->Clients->Howtopays->find('list', ['limit' => 200]);
        $projects = $this->Clients->Projects->find('list', ['limit' => 200]);
        $commissionAdmits = $this->Clients->CommissionAdmits->find('list', ['limit' => 200]);
        $sexes = $this->Clients->Sexes->find('list', ['limit' => 200]);
        $payReasons = $this->Clients->PayReasons->find('list', ['limit' => 200]);
        $endclients = $this->Clients->Endclients->find('list' ,['limit' => 200]);
        $this->set(compact('client', 'paidstatuses', 'managers', 'howtopays', 'projects', 'commissionAdmits', 'sexes', 'payReasons', 'endclients'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
