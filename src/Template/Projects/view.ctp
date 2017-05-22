<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <?php
           /*
            特定の条件に当てはまるクライアント一覧を表示する画面
           */
          ?>

          <p class="clients-title"><td><?= h($project->name)?></td>に参加した人物一覧</p>
          <table class="table">
            <thead>
                <tr><th><?= $this->Paginator->sort('Clients.first_name',"名前 (年齢)")?></th><th><?= $this->Paginator->sort('Clients.first_name',"性別")?></th><th><?= $this->Paginator->sort('Clients.first_name_ruby',"フリガナ")?></th>
                  <th><?= $this->Paginator->sort('Clients.evaluation',"評価")?></th><th><?= $this->Paginator->sort('name','プロジェクト名')?></th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php foreach($clients as $client):?>
                    <tr class="gray_background">
                        <td><?= $this->Html->link($client->client->first_name . $client->client->last_name . "(" . $client->client->age . ")",['controller' => 'clients' , 'action' => 'view' ,$client->client->id])?></td>
                        <td><?= h($sex[$client->client->sexes_id]) ?></td>
                        <td><?= h($client->client->first_name_ruby) . h($client->client->last_name_ruby)?></td>
                        <td><?= h($client->client->evaluation)?></td>
                        <td><?= h($project->name)?></td>
                        <td><?= $this->Form->postLink(__('削除'), ['controller'=>'clientsProjects', 'action' => 'delete',$client->id], ['confirm' => __('本当に削除してよろしいですか？?', $client->id)]) ?></td>
                  </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="search_form project_client">
      <div>
      <h2><img src="/img/add.jpg" width="25px" height="25px"></h2>
      <?= $this->Form->create(null,['style'=>'display:none'])?>
        <?php echo $this->Form->control('clients_id', ['label' => '参加者を追加する','options' => $clients_ids ]);?>
        <?= $this->Form->button(__('送信'))?>
        <?= $this->Form->end() ?>
      </div>
    </div>
    <div class="pagination">
      <ul class="list-unstyled list-inline">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>
    </div>
