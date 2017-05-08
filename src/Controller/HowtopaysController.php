<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Howtopays Controller
 *
 * @property \App\Model\Table\HowtopaysTable $Howtopays
 */
class HowtopaysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $howtopays = $this->paginate($this->Howtopays);

        $this->set(compact('howtopays'));
        $this->set('_serialize', ['howtopays']);
    }

    /**
     * View method
     *
     * @param string|null $id Howtopay id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $howtopay = $this->Howtopays->get($id, [
            'contain' => []
        ]);

        $this->set('howtopay', $howtopay);
        $this->set('_serialize', ['howtopay']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $howtopay = $this->Howtopays->newEntity();
        if ($this->request->is('post')) {
            $howtopay = $this->Howtopays->patchEntity($howtopay, $this->request->getData());
            if ($this->Howtopays->save($howtopay)) {
                $this->Flash->success(__('支払い方法が新たに追加されました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('登録できませんでした。登録内容を再度ご確認ください'));
        }
        $this->set(compact('howtopay'));
        $this->set('_serialize', ['howtopay']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Howtopay id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $howtopay = $this->Howtopays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $howtopay = $this->Howtopays->patchEntity($howtopay, $this->request->getData());
            if ($this->Howtopays->save($howtopay)) {
                $this->Flash->success(__('支払い方法を編集しました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('編集できませんでした。再度編集内容をご確認ください'));
        }
        $this->set(compact('howtopay'));
        $this->set('_serialize', ['howtopay']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Howtopay id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $howtopay = $this->Howtopays->get($id);
        if ($this->Howtopays->delete($howtopay)) {
            $this->Flash->success(__('削除しました'));
        } else {
            $this->Flash->error(__('削除できませんでした'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
