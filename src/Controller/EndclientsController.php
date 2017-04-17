<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Endclients Controller
 *
 * @property \App\Model\Table\EndclientsTable $Endclients
 */
class EndclientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $endclients = $this->paginate($this->Endclients);

        $this->set(compact('endclients'));
        $this->set('_serialize', ['endclients']);
    }

    /**
     * View method
     *
     * @param string|null $id Endclient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $endclient = $this->Endclients->get($id, [
            'contain' => []
        ]);

        $this->set('endclient', $endclient);
        $this->set('_serialize', ['endclient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $endclient = $this->Endclients->newEntity();
        if ($this->request->is('post')) {
            $endclient = $this->Endclients->patchEntity($endclient, $this->request->getData());
            if ($this->Endclients->save($endclient)) {
                $this->Flash->success(__('The endclient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The endclient could not be saved. Please, try again.'));
        }
        $this->set(compact('endclient'));
        $this->set('_serialize', ['endclient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Endclient id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $endclient = $this->Endclients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $endclient = $this->Endclients->patchEntity($endclient, $this->request->getData());
            if ($this->Endclients->save($endclient)) {
                $this->Flash->success(__('The endclient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The endclient could not be saved. Please, try again.'));
        }
        $this->set(compact('endclient'));
        $this->set('_serialize', ['endclient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Endclient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $endclient = $this->Endclients->get($id);
        if ($this->Endclients->delete($endclient)) {
            $this->Flash->success(__('The endclient has been deleted.'));
        } else {
            $this->Flash->error(__('The endclient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
