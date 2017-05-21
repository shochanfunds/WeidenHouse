<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

  public function initialize(){

  }
  public function errorLog($message,$error_name){
    $today = date("Y-m-d");
    $now = date("Y-m-d H:i:s");
    $file_name = "/logs/error/" . $today . ".log";
    $file = fopen($file_name,'a');
    $message = $now . ":" ."< $error_name >". $message;
    fwrite($file, $message . "\n");
    fclose($file);
  }
  public function actionLog($message,$action_name){
    $today = date("Y-m-d");
    $now = date("Y-m-d H:i:s");
    $file_name = "/logs/action/" . $today . ".log";
    $file = fopen($file_name,'a');
    $message = $now . ":" ."< $action_name >". $message;
    fwrite($file, $message . "\n");
    fclose($file);
  }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->paginate = [
            'order' => [ 'id' => 'desc']
        ];
        $projects = $this->paginate($this->Projects);


        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        $sexes = TableRegistry::get("Sexes");
        $clients_projects = TableRegistry::get("ClientsProjects");
        $clients = TableRegistry::get("Clients");
        $client_1=$clients_projects
          ->find('all')
          ->contain(['Clients','Projects'])
          ->where(['ClientsProjects.projects_id' =>$id])
          ->toArray();
        $client_2 = $clients
          ->find('all')
          ->where(['Clients.projects_id' => $id])
          ->toArray();
        $client_1=array_merge($client_1,$client_2);
        $sexes = $sexes->find('all')->toArray();
        $sex = array();
        foreach($sexes as $m_or_l){
          $sex[$m_or_l->id] = $m_or_l->name;
        }
        if($this->request->is('post')){
          $clients_projects_entitiy = $clients_projects->newEntity();
          $clients_projects_entitiy->clients_id = $this->request->getData()["clients_id"];
          $clients_projects_entitiy->projects_id = $id;
          if ($clients_projects->save($clients_projects_entitiy)) {
            return $this->redirect(['action' => 'view',$id]);
          }else{
            return $this->redirect(['action' => 'view',$id]);
          }
        }
        $clients_ids = $clients->find('list', ['limit' => 200])->order(['Clients.id' => 'DESC']);
        $this->set('clients_ids',$clients_ids);
        $this->set('sex',$sex);
        $this->set('clients',$client_1);
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $input_data = "$project->name が新たに追加されました";
                $this->actionLog($input_data,'プロジェクト情報新規登録');

                return $this->redirect(['action' => 'index']);
            }
            $input_data = "$project->name を登録しようとしましたが、登録情報に不正が見つかったため、処理をブロックしました";
            $this->errorLog($input_data,'プロジェクト情報新規登録失敗');
        }
        $this->set(compact('project'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $input_data = "$project->name を編集しました";
                $this->actionLog($input_data,'プロジェクト情報編集');

                return $this->redirect(['action' => 'index']);
            }
            $input_data = "$client->name を編集しようとしましたが、編集内容に不正が見つかったため処理をブロックしました";
            $this->errorLog($input_data,'新規プロジェクト登録失敗');
        }
        $this->set(compact('project'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->find()->where(['id' => $id])->first();
        $delete = $this->Projects->query()->delete();
        $delete->where(['id' => $id]);
        $delete->execute();

/*
        if ($this->Projects->delete($project)) {
            $input_data = "$project->name を削除しました";
            $this->actionLog($input_data,'プロジェクト情報削除');
        } else {
            $input_data = "$client->name を削除しようとしましたが、失敗しました";
            $this->errorLog($input_data,'新規プロジェクト削除失敗');
        }

*/
        return $this->redirect(['action' => 'index']);
    }
}
