<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Managers Controller
 *
 * @property \App\Model\Table\ManagersTable $Managers
 */
class ManagersController extends AppController
{

  public function login()
  {
      if($this->request->is('post')) {
          $user = $this->Auth->identify();

          if ($user){
              $this->Auth->setUser($user);
              return $this->redirect($this->Auth->redirectUrl());
          } else {
              $this->Flash->error('ログイン情報が間違っています。システムの管理者に通報しました');
          }
      }
  }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Statuses']
        ];
        $managers = $this->paginate($this->Managers);
        $this->loadModel('Managers');
        $valiables = $this->Managers->valiables();

        $this->set('root_dir',$valiables["root_dir"]);
        $this->set(compact('managers'));
        $this->set('_serialize', ['managers']);
    }

    /**
     * View method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manager = $this->Managers->get($id, [
            'contain' => ['Statuses']
        ]);

        $this->loadModel('Managers');
        $valiables = $this->Managers->valiables();

        $this->set('root_dir',$valiables["root_dir"]);
        $this->set('manager', $manager);
        $this->set('_serialize', ['manager']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manager = $this->Managers->newEntity();
        if ($this->request->is('post')) {
            $manager = $this->Managers->patchEntity($manager, $this->request->getData());
            if ($this->Managers->save($manager)) {
                $this->Flash->success(__('The manager has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manager could not be saved. Please, try again.'));
        }
        $statuses = $this->Managers->Statuses->find('list', ['limit' => 200]);

        $this->loadModel('Managers');
        $valiables = $this->Managers->valiables();


        $this->set('root_dir',$valiables["root_dir"]);
        $this->set(compact('manager', 'statuses'));
        $this->set('_serialize', ['manager']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manager = $this->Managers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manager = $this->Managers->patchEntity($manager, $this->request->getData());
            if ($this->Managers->save($manager)) {
                $this->Flash->success(__('The manager has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manager could not be saved. Please, try again.'));
        }
        $statuses = $this->Managers->Statuses->find('list', ['limit' => 200]);

        $this->loadModel('Managers');
        $valiables = $this->Managers->valiables();

        $this->set('root_dir',$valiables["root_dir"]);
        $this->set(compact('manager', 'statuses'));
        $this->set('_serialize', ['manager']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manager = $this->Managers->get($id);
        if ($this->Managers->delete($manager)) {
            $this->Flash->success(__('The manager has been deleted.'));
        } else {
            $this->Flash->error(__('The manager could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
