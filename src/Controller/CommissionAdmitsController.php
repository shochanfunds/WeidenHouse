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
                $this->Flash->success(__('手数料差引管理情報が新たに追加されました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('登録できませんでした。登録内容を再度ご確認ください'));
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
                $this->Flash->success(__('手数料差引管理情報が編集されました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('編集できませんでした。再度編集内容をご確認ください'));
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
            $this->Flash->success(__('削除しました'));
        } else {
            $this->Flash->error(__('削除できませんでした'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
