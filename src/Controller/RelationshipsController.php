<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Relationships Controller
 *
 * @property \App\Model\Table\RelationshipsTable $Relationships
 */
class RelationshipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $relationships = $this->paginate($this->Relationships);

        $this->set(compact('relationships'));
        $this->set('_serialize', ['relationships']);
    }

    /**
     * View method
     *
     * @param string|null $id Relationship id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relationship = $this->Relationships->get($id, [
            'contain' => []
        ]);

        $this->set('relationship', $relationship);
        $this->set('_serialize', ['relationship']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relationship = $this->Relationships->newEntity();
        if ($this->request->is('post')) {
            $relationship = $this->Relationships->patchEntity($relationship, $this->request->getData());
            if ($this->Relationships->save($relationship)) {
                $this->Flash->success(__('The relationship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The relationship could not be saved. Please, try again.'));
        }
        $this->set(compact('relationship'));
        $this->set('_serialize', ['relationship']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Relationship id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relationship = $this->Relationships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relationship = $this->Relationships->patchEntity($relationship, $this->request->getData());
            if ($this->Relationships->save($relationship)) {
                $this->Flash->success(__('The relationship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The relationship could not be saved. Please, try again.'));
        }
        $this->set(compact('relationship'));
        $this->set('_serialize', ['relationship']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Relationship id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clients = TableRegistry::get("Clients");
        $relationship = $this->Relationships->get($id);
        $client_id=$clients->find('all')->where(['Clients.first_name'=>$relationship->friends])->select(['id'])->toArray()[0];
        if ($this->Relationships->delete($relationship)) {
            $this->Flash->success(__('友達関係を削除しました。'));
        } else {
            $this->Flash->error(__('失敗しました。'));
        }

        return $this->redirect(['controller'=>'clients','action' => 'view',$client_id["id"]]);
    }
}
