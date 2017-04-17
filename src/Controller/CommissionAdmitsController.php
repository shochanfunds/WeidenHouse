<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CommissionAdmits Controller
 *
 * @property \App\Model\Table\CommissionAdmitsTable $CommissionAdmits
 */
class CommissionAdmitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $commissionAdmits = $this->paginate($this->CommissionAdmits);

        $this->set(compact('commissionAdmits'));
        $this->set('_serialize', ['commissionAdmits']);
    }

    /**
     * View method
     *
     * @param string|null $id Commission Admit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commissionAdmit = $this->CommissionAdmits->get($id, [
            'contain' => []
        ]);

        $this->set('commissionAdmit', $commissionAdmit);
        $this->set('_serialize', ['commissionAdmit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commissionAdmit = $this->CommissionAdmits->newEntity();
        if ($this->request->is('post')) {
            $commissionAdmit = $this->CommissionAdmits->patchEntity($commissionAdmit, $this->request->getData());
            if ($this->CommissionAdmits->save($commissionAdmit)) {
                $this->Flash->success(__('The commission admit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commission admit could not be saved. Please, try again.'));
        }
        $this->set(compact('commissionAdmit'));
        $this->set('_serialize', ['commissionAdmit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Commission Admit id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commissionAdmit = $this->CommissionAdmits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commissionAdmit = $this->CommissionAdmits->patchEntity($commissionAdmit, $this->request->getData());
            if ($this->CommissionAdmits->save($commissionAdmit)) {
                $this->Flash->success(__('The commission admit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commission admit could not be saved. Please, try again.'));
        }
        $this->set(compact('commissionAdmit'));
        $this->set('_serialize', ['commissionAdmit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Commission Admit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commissionAdmit = $this->CommissionAdmits->get($id);
        if ($this->CommissionAdmits->delete($commissionAdmit)) {
            $this->Flash->success(__('The commission admit has been deleted.'));
        } else {
            $this->Flash->error(__('The commission admit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
