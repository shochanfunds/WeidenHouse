<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClientsProjects Controller
 *
 * @property \App\Model\Table\ClientsProjectsTable $ClientsProjects
 */
class ClientsProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Projects']
        ];
        $clientsProjects = $this->paginate($this->ClientsProjects);

        $this->set(compact('clientsProjects'));
        $this->set('_serialize', ['clientsProjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Clients Project id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientsProject = $this->ClientsProjects->get($id, [
            'contain' => ['Clients', 'Projects']
        ]);

        $this->set('clientsProject', $clientsProject);
        $this->set('_serialize', ['clientsProject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientsProject = $this->ClientsProjects->newEntity();
        if ($this->request->is('post')) {
            $clientsProject = $this->ClientsProjects->patchEntity($clientsProject, $this->request->getData());
            if ($this->ClientsProjects->save($clientsProject)) {
                $this->Flash->success(__('The clients project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clients project could not be saved. Please, try again.'));
        }
        $clients = $this->ClientsProjects->Clients->find('list', ['limit' => 200]);
        $projects = $this->ClientsProjects->Projects->find('list', ['limit' => 200]);
        $this->set(compact('clientsProject', 'clients', 'projects'));
        $this->set('_serialize', ['clientsProject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clients Project id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientsProject = $this->ClientsProjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientsProject = $this->ClientsProjects->patchEntity($clientsProject, $this->request->getData());
            if ($this->ClientsProjects->save($clientsProject)) {
                $this->Flash->success(__('The clients project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clients project could not be saved. Please, try again.'));
        }
        $clients = $this->ClientsProjects->Clients->find('list', ['limit' => 200]);
        $projects = $this->ClientsProjects->Projects->find('list', ['limit' => 200]);
        $this->set(compact('clientsProject', 'clients', 'projects'));
        $this->set('_serialize', ['clientsProject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clients Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientsProject = $this->ClientsProjects->get($id);
        if ($this->ClientsProjects->delete($clientsProject)) {
            $this->Flash->success(__('The clients project has been deleted.'));
        } else {
            $this->Flash->error(__('The clients project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
