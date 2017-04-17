<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paidstatuses Controller
 *
 * @property \App\Model\Table\PaidstatusesTable $Paidstatuses
 */
class PaidstatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $paidstatuses = $this->paginate($this->Paidstatuses);

        $this->set(compact('paidstatuses'));
        $this->set('_serialize', ['paidstatuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Paidstatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paidstatus = $this->Paidstatuses->get($id, [
            'contain' => []
        ]);

        $this->set('paidstatus', $paidstatus);
        $this->set('_serialize', ['paidstatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paidstatus = $this->Paidstatuses->newEntity();
        if ($this->request->is('post')) {
            $paidstatus = $this->Paidstatuses->patchEntity($paidstatus, $this->request->getData());
            if ($this->Paidstatuses->save($paidstatus)) {
                $this->Flash->success(__('The paidstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paidstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('paidstatus'));
        $this->set('_serialize', ['paidstatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paidstatus id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paidstatus = $this->Paidstatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paidstatus = $this->Paidstatuses->patchEntity($paidstatus, $this->request->getData());
            if ($this->Paidstatuses->save($paidstatus)) {
                $this->Flash->success(__('The paidstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paidstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('paidstatus'));
        $this->set('_serialize', ['paidstatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paidstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paidstatus = $this->Paidstatuses->get($id);
        if ($this->Paidstatuses->delete($paidstatus)) {
            $this->Flash->success(__('The paidstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The paidstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}