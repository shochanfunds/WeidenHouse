<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayReasons Controller
 *
 * @property \App\Model\Table\PayReasonsTable $PayReasons
 */
class PayReasonsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $payReasons = $this->paginate($this->PayReasons);

        $this->set(compact('payReasons'));
        $this->set('_serialize', ['payReasons']);
    }

    /**
     * View method
     *
     * @param string|null $id Pay Reason id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payReason = $this->PayReasons->get($id, [
            'contain' => []
        ]);

        $this->set('payReason', $payReason);
        $this->set('_serialize', ['payReason']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payReason = $this->PayReasons->newEntity();
        if ($this->request->is('post')) {
            $payReason = $this->PayReasons->patchEntity($payReason, $this->request->getData());

            if ($this->PayReasons->save($payReason)) {
                $this->Flash->success(__('謝礼理由が新たに登録されました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('登録できませんでした。登録内容を再度ご確認ください'));
        }
        $this->set(compact('payReason'));
        $this->set('_serialize', ['payReason']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Reason id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payReason = $this->PayReasons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payReason = $this->PayReasons->patchEntity($payReason, $this->request->getData());
            if ($this->PayReasons->save($payReason)) {
                $this->Flash->success(__('The pay reason has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay reason could not be saved. Please, try again.'));
        }
        $this->set(compact('payReason'));
        $this->set('_serialize', ['payReason']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Reason id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payReason = $this->PayReasons->get($id);
        if ($this->PayReasons->delete($payReason)) {
            $this->Flash->success(__('The pay reason has been deleted.'));
        } else {
            $this->Flash->error(__('The pay reason could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
