<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
  public function errorLog($message,$error_name){
    $today = date("Y-m-d");
    $now = date("Y-m-d H:i:s");
    $file_name = "/Applications/MAMP/htdocs/PersonalTool/webroot/logs/error/" . $today . ".log";
    $file = fopen($file_name,'a');
    $message = $now . ":" ."< $error_name >". $message;
    fwrite($file, $message . "\n");
    fclose($file);
  }
  public function actionLog($message,$action_name){
    $today = date("Y-m-d");
    $now = date("Y-m-d H:i:s");
    $file_name = "/Applications/MAMP/htdocs/PersonalTool/webroot/logs/action/" . $today . ".log";
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
                $this->Flash->success(__('プロジェクト情報が新たに追加されました'));
                $input_data = "$project->name が新たに追加されました";
                $this->actionLog($input_data,'プロジェクト情報新規登録');

                return $this->redirect(['action' => 'index']);
            }
            $input_data = "$project->name を登録しようとしましたが、登録情報に不正が見つかったため、処理をブロックしました";
            $this->errorLog($input_data,'プロジェクト情報新規登録失敗');
            $this->Flash->error(__('登録できませんでした。登録内容を再度ご確認ください'));
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
                $this->Flash->success(__('プロジェクト情報を編集しました'));
                $input_data = "$project->name を編集しました";
                $this->actionLog($input_data,'プロジェクト情報編集');

                return $this->redirect(['action' => 'index']);
            }
            $input_data = "$client->name を編集しようとしましたが、編集内容に不正が見つかったため処理をブロックしました";
            $this->errorLog($input_data,'新規プロジェクト登録失敗');
            $this->Flash->error(__('編集に失敗しました。再度編集内容をご確認ください'));
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
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
            $input_data = "$project->name を削除しました";
            $this->actionLog($input_data,'プロジェクト情報削除');
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
            $input_data = "$client->name を削除しようとしましたが、失敗しました";
            $this->errorLog($input_data,'新規プロジェクト削除失敗');
        }

        return $this->redirect(['action' => 'index']);
    }
}
