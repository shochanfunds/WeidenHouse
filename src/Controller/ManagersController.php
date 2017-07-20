<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;



/**
 * Managers Controller
 *
 * @property \App\Model\Table\ManagersTable $Managers
 */
class ManagersController extends AppController
{

    public function errorLog($message,$error_name){
      $today = date("Y-m-d");
      $now = date("Y-m-d H:i:s");
      $file_name = "/logs/error/" . $today . ".log";
      $file = fopen($file_name,'a');
      $message = $now . ":" ."< $error_name >". $message;
      fwrite($file, $message . "l\n");
      fclose($file);
    }
    public function actionLog($message,$action_name){
      $today = date("Y-m-d");
      $now = date("Y-m-d H:i:s");
      $file_name = "/logs/action/" . $today . ".log";
      $file = fopen($file_name,'a');
      $message = $now . ":" ."< $action_name >". $message;
      fwrite($file, $message . "l\n");
      fclose($file);
    }
    public function login()
    {
        if($this->request->is('post')) {
          $setinfo = $this->Managers->newEntity();
          $manager_info = $this->Managers->patchEntity($setinfo, $this->request->getData());
          $manager = $this->Auth->identify();
          if($manager){
            $this->Auth->setUser($manager);
            $input_data = "Username : " . $manager_info->username . " : Password : " .$manager_info->password;
            $user_data = $this->Managers->findByUsername($manager_info->username);
            $manager = $user_data->toArray();
            $physicalwidth_real = $manager[0]->physicalwidth;
            $physicalheight_real = $manager[0]->physicalheight;
            $physicalwidth_input = $manager_info->physicalwidth;
            $physicalheight_input = $manager_info->physicalheight;
            if($physicalwidth_real === $physicalwidth_input && $physicalheight_real === $physicalheight_input){
              $this->actionLog($input_data,"ログイン");
              return $this->redirect(['controller' => 'clients' ,'action' => 'index']);
            }else{
              $this->Flash->error(__('ログインに失敗しました。システム管理者に通報が行きました'));
              $input_data = "Username : " . $manager_info->username  . " : Passoword : " .$manager_info->password;
              $this->errorLog($input_data,"ログインエラー");
              return $this->redirect($this->Auth->logout());
            }
          }else{
            $this->Flash->error(__('ログインに失敗しました。システム管理者に通報が行きました'));
            $input_data = "Username : " . $manager_info->username  . " : Passoword : " .$manager_info->password;
            $this->errorLog($input_data,"ログインエラー");
            return $this->redirect($this->Auth->logout());
          }
        }
    }
    public function logout(){
      return $this->redirect($this->Auth->logout());
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
             $auth=$this->Managers->find('all')->where(['id' => '546']);
             $hash = $auth->toArray()[0]["password"];

             if (password_verify($manager["addpassword"], $hash)) {
               if ($this->Managers->save($manager)) {
                   $this->Flash->success(__('運営者情報が編集されました'));
                   $input_data = "$manager->username を追加しました";
                   $this->actionLog($input_data,"運営者アカウント追加");
                   return $this->redirect(['action' => 'login']);
               }
              } else {
                $this->Flash->error(__('追加できませんでした。再度内容をご確認ください'));
                $input_data = "$manager->usernameを追加しようとしましたが、不正があったため処理をブロックしました";
                $this->errorLog($input_data,"追加内容不正");
              }
         }
         $statuses = $this->Managers->Statuses->find('list', ['limit' => 200]);
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
                $this->Flash->success(__('運営者情報を編集しました'));
                $input_data = $manager->username . "の運営者情報を編集しました";
                $this->actionLog($input_data,"運営者情報編集");

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('編集できませんでした。編集内容を再度ご確認ください'));
            $input_data = "$manager->username の情報を編集しました";
            $this->errorLog($input_data,"運営者情報編集失敗");
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
            $this->Flash->success(__('削除しました'));
            $input_data = "$manager->username を削除しました";
            $this->actionLog($input_data,"運営者アカウント削除");
        } else {
            $this->Flash->error(__('削除できませんでした'));
            $input_data = "$manager->usernameを削除しようとしましたが、失敗しました";
            $this->errorLog($input_data,'運営者アカウント削除ミス');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\Event $event) {
    	parent::beforeFilter($event);
    	$this->Auth->allow(['add']);
    }

}
