<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ClientsController extends AppController
{

    public function initialize()
    {
      parent::initialize();
      $this->projects = TableRegistry::get('Projects');
      $this->clientsprojects = TableRegistry::get('ClientsProjects');
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
            'contain' => ['Paidstatuses', 'Managers', 'Howtopays', 'Projects', 'CommissionAdmits', 'Sexes', 'PayReasons', 'Endclients' ,'Categories'],
            'order' => [ 'id' => 'desc']
        ];
        $today = date("m-d");
        $birthday = count($this->Clients->find('all')->where(['Clients.birthday LIKE' =>  "%$today%" ])->toArray());
        if($this->request->query['username']){ $username = $this->request->query['username']; }else{ $username = NULL; }
        $phone_number = $this->request->query["phone_number"];
        $project_name = $this->request->query["project_name"];
        if($this->request->query['first_name_ruby']){ $username_ruby = $this->request->query['first_name_ruby']; }else{ $username_ruby = NULL; }
        $category = $this->request->query["category"];
        $birth = $this->request->query["birth"];
        $choised_clients = $this->Clients->find('all')
        ->contain(['Projects'])
        ->where(['Clients.first_name LIKE' => "%$username%"])
        ->where(['Clients.phone_number LIKE' => "%$phone_number%"])
        ->where(['Clients.birthday LIKE' => "%$birth%"])
        ->where(['Projects.name LIKE' =>"%$project_name%"]);
        $clients = $this->paginate($choised_clients);
        $this->set(compact('clients'));
        $this->set(compact('birthday'));
        $this->set('_serialize', ['clients']);
    }
    public function paidornot(){
      $this->paginate = [
          'contain' => ['Paidstatuses', 'Managers', 'Howtopays', 'Projects', 'CommissionAdmits', 'Sexes', 'PayReasons', 'Endclients' ,'Categories'],
          'order' => ['id' => 'desc']
      ];
      if($this->request->query['username']){ $username = $this->request->query['username']; }else{ $username = NULL; }
      $username_ruby = $this->request->query['first_name_ruby'];
      $phone_number = $this->request->query["phone_number"];
      $project_name = $this->request->query["project_name"];
      $category = $this->request->query["category"];
      $birth = $this->request->query["birth"];
      $choised_clients = $this->Clients->find('all')
      ->contain(['Projects'])
      ->where(['Clients.first_name LIKE' => "%$username%"])
      ->where(['Clients.phone_number LIKE' => "%$phone_number%"])
      ->where(['Clients.birthday LIKE' => "%$birth%"])
      ->where(['Projects.name LIKE' =>"%$project_name%"]);
      $clients = $this->paginate($choised_clients);
      //$clients = $this->paginate($this->Clients);
      $this->set(compact('clients'));
      $this->set('_serialize', ['clients']);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $client = $this->Clients->get($id, [
            'contain' => ['Paidstatuses', 'Managers', 'Howtopays', 'Projects', 'CommissionAdmits', 'Sexes', 'PayReasons' ,'Endclients' ,'Categories']
        ]);

        //とりあえずThumbnail画像を表示する
        $projects_query = $this->clientsprojects->find('all')->where(['clients_id' =>$id]);
        $project_array = array();
        foreach($projects_query as $data){
          $project =$this->projects->find('all')->where(['id' => $data->projects_id]);
          foreach($project as $test){
            $project_array[] = $test->name;
          }
        }
        $thumbnail_path = '/img/thumbnail/';
        $this->loadModel('Clients');
        $thumbnail = $this->Clients->thumbnail();
        $this->set("test",$project_array);
        $this->set('thumbnail',$thumbnail);
        $this->set('thumbnail_position' , $thumbnail_path);
        $this->set('client', $client);
        $this->set('_serialize', ['client']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            $client->thumbnail_name = $this->request->data['thumbnail']['name'];
            $thumbnail_img = "img_" . $client->id . "_" . $this->request->data['thumbnail']['name'];
            if($this->request->data['thumbnail']['name'] == NULL){
              $client->thumbnail_name = NULL;
            }else{
              $client->thumbnail_name = $thumbnail_img;
            }
            $this->actionLog($input_data,"インタビュー対象者登録");
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('インタビュー対象者情報が新たに追加されました'));
                $input_data = "Clientname : " . $client->first_name . $client->last_name."が新たに追加されました";
                move_uploaded_file($this->request->data['thumbnail']['tmp_name'],  ROOT . "/webroot/img/thumbnail/" .$thumbnail_img);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('登録できませんでした。登録内容を再度ご確認ください'));
            $input_data = "インタビュー対象者情報登録時に不正を検出しました。処理をブロックしました";
            $this->errorLog($input_data,'インタビュー対象者登録失敗');
        }
        $paidstatuses = $this->Clients->Paidstatuses->find('list', ['limit' => 200]);
        $managers = $this->Clients->Managers->find('list', ['limit' => 200]);
        $howtopays = $this->Clients->Howtopays->find('list', ['limit' => 200]);
        $projects = $this->Clients->Projects->find('list', ['limit' => 200]);
        $commissionAdmits = $this->Clients->CommissionAdmits->find('list', ['limit' => 200]);
        $sexes = $this->Clients->Sexes->find('list', ['limit' => 200]);
        $payReasons = $this->Clients->PayReasons->find('list', ['limit' => 200]);
        $endclients = $this->Clients->Endclients->find('list' ,['limit' => 200]);
        $categories = $this->Clients->Categories->find('list' , ['limit' => 200]);
        $this->set(compact('client', 'paidstatuses', 'managers', 'howtopays', 'projects', 'commissionAdmits', 'sexes', 'payReasons', 'endclients' ,'categories'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            $data = $this->request->data;
            $thumbnail_img = "img_" . $client->id . "_" . $client->thumbnail["name"];
            if($client->thumbnail["name"] == NULL){
              $client->thumbnail_name = $client->thumbnail_name;
            }else{
              $client->thumbnail_name = $thumbnail_img;
            }
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('インタビュー対処者情報が編集されました'));
                $input_data ="$client->first_name $client->last_name が編集されました";
                $this->actionLog($input_data,'インタビュー対象者情報編集');
                move_uploaded_file($this->request->data['thumbnail']['tmp_name'],  ROOT . "/webroot/img/thumbnail/" .$thumbnail_img);

                return $this->redirect(['action' => 'index']);
            }
            $input_data = "$client->first_name $client->last_name を編集しようとしましたが、編集内容に不正を検出したため処理をブロックしました";
            $this->errorLog($input_data,'インタビュー対象者情報編集失敗');
            $this->Flash->error(__('編集できませんでした。編集内容を再度ご確認ください'));
        }
        $paidstatuses = $this->Clients->Paidstatuses->find('list', ['limit' => 200]);
        $managers = $this->Clients->Managers->find('list', ['limit' => 200]);
        $howtopays = $this->Clients->Howtopays->find('list', ['limit' => 200]);
        $projects = $this->Clients->Projects->find('list', ['limit' => 200]);
        $commissionAdmits = $this->Clients->CommissionAdmits->find('list', ['limit' => 200]);
        $sexes = $this->Clients->Sexes->find('list', ['limit' => 200]);
        $payReasons = $this->Clients->PayReasons->find('list', ['limit' => 200]);
        $endclients = $this->Clients->Endclients->find('list' ,['limit' => 200]);
        $categories = $this->Clients->Categories->find('list' ,['limit' => 200]);
        $this->set(compact('client', 'paidstatuses', 'managers', 'howtopays', 'projects', 'commissionAdmits', 'sexes', 'payReasons', 'endclients' ,'categories'));
        $this->set('_serialize', ['client']);
    }

    public function birthday(){
      $today = date("m-d");
      $clients = $this->Clients->find('all')->where(['Clients.birthday LIKE' =>  "%$today%" ]);
      $this->set(compact('clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('削除しました'));
            $input_data = "$client->first_name $client->last_name を削除しました";
            $this->actionLog($input_data,'インタビュー対象者削除');
        } else {
            $input_data = "$client->first_name $client->last_name を削除しようとしましたが、失敗しました";
            $this->errorLog($input_data,'インタビュー対象者情報削除失敗');
            $this->Flash->error(__('削除できませんでした。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
