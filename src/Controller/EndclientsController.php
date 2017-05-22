<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Endclients Controller
 *
 * @property \App\Model\Table\EndclientsTable $Endclients
 */
class EndclientsController extends AppController
{

      public function errorLog($message,$error_name){
        $today = date("Y-m-d");
        $now = date("Y-m-d H:i:s");
        $file_name = "/Applications/MAMP/htdocs/PersonalTool/webroot/logs/error/" . $today . ".log";
        $file = fopen($file_name,'a');
        $message = $now . ":" ."< $error_name >". $message;
        fwrite($file, $message . "l\n");
        fclose($file);
      }
      public function actionLog($message,$action_name){
        $today = date("Y-m-d");
        $now = date("Y-m-d H:i:s");
        $file_name = "/Applications/MAMP/htdocs/PersonalTool/webroot/logs/action/" . $today . ".log";
        $file = fopen($file_name,'a');
        $message = $now . ":" ."< $action_name >". $message;
        fwrite($file, $message . "l\n");
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
        $endclients = $this->paginate($this->Endclients);
        $this->set(compact('endclients'));
        $this->set('_serialize', ['endclients']);
    }

    /**
     * View method
     *
     * @param string|null $id Endclient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $endclient = $this->Endclients->get($id, [
            'contain' => []
        ]);

        $this->set('endclient', $endclient);
        $this->set('_serialize', ['endclient']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $endclient = $this->Endclients->newEntity();
        if ($this->request->is('post')) {
            $endclient = $this->Endclients->patchEntity($endclient, $this->request->getData());
            if ($this->Endclients->save($endclient)) {
                $this->Flash->success(__('エンドクライアント情報が新たに追加されました'));
                $input_data = "$endclient->name が新たに追加されました";
                $this->actionLog($input_data,'エンドクライアント追加');

                return $this->redirect(['action' => 'index']);
            }
            $input_data = "$endclient->name を追加しようとしましたが、登録内容に不正を検出したため処理をブロックしました";
            $this->errorLog($input_data,'エンドクライアント追加失敗');
            $this->Flash->error(__('登録できませんでした。再度登録内容をご確認ください'));
        }
        $this->set(compact('endclient'));
        $this->set('_serialize', ['endclient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Endclient id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $endclient = $this->Endclients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $endclient = $this->Endclients->patchEntity($endclient, $this->request->getData());
            if ($this->Endclients->save($endclient)) {
                $this->Flash->success(__('エンドクライアント情報が編集されました'));
                $input_data = "$endclient->name を編集しました";
                $this->actionLog($input_data,'エンドクライアント情報編集');
                return $this->redirect(['action' => 'index']);
            }
            $input_data = "$endclient->name を編集しようとしましたが、編集内容に不正を検出したため処理をブロックしました";
            $this->errorLog($input_data,'エンドクライアント情報編集失敗');
            $this->Flash->error(__('編集できませんでした。再度編集内容をご確認ください'));
        }
        $this->set(compact('endclient'));
        $this->set('_serialize', ['endclient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Endclient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $endclient = $this->Endclients->get($id);
        if ($this->Endclients->delete($endclient)) {
            $this->Flash->success(__('エンドクライアントを削除しました'));
            $input_data = "$endclient->name を削除しました";
            $this->actionLog($input_data,'エンドクライアント削除');
        } else {
            $input_data = "$endclient->name を削除しようとしましたが失敗しました";
            $this->errorLog($input_data,'エンドクライアント情報削除');
            $this->Flash->error(__('削除できませんでした'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
