<div class="clearfix all_wrapper">
  <p class="birth_alert"><?= $this->Html->link("今日誕生日の人は" . $birthday . "人います",['controller'=>'clients' , 'action' => 'birthday']);?></p>
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
            <div class="search_form hover_effect">
              <h2><img src="/img/search_icon.png" width="25px" height="25px"></h2>
              <div id="form_div" style="display:none">
              <?= $this->Form->create(null, ['type' => 'get'])?>
                <?php echo $this->Form->input('username',['value' => $this->request->query('username'),'label' => '名前']);?>
                <?php echo $this->Form->input('first_name_ruby',['value' => $this->request->query('first_name_ruby'),'label'=>'フリガナ']);?>
                <?php echo $this->Form->input('project_name',['value' => $this->request->query('project_name'),'label' => 'プロジェクト名']);?>
                <?php echo $this->Form->input('phone_number',['value' => $this->request->query('phone_number'),'label' => '電話番号']);?>
                <?php echo $this->Form->input('category',['value' => $this->request->query('category'),'label'=>'カテゴリ']);?>
                <?php echo $this->Form->input('birth',['value' => $this->request->query('birth'),'label'=>'誕生日','placeholder'=>'例:2017-05-05']);?>
                <?= $this->Form->button(__('検索'))?>
                <?= $this->Form->end() ?>
              </div>
            </div>

          <p class="clients-title">インタビュー対象者一覧 (全て)</p>
          <table class="table">
            <thead>
                <tr><th><?= $this->Paginator->sort('first_name',"名前 (年齢)")?></th><th><?= $this->Paginator->sort('first_name',"性別")?></th><th><?= $this->Paginator->sort('first_name_ruby',"フリガナ")?></th>
                  <th><?= $this->Paginator->sort('evaluation',"評価")?></th><th><?= $this->Paginator->sort('Category.name','所属')?></th><th><?= $this->Paginator->sort('Project.name','プロジェクト名')?></th>
                  <th><?= $this->Paginator->sort('Manager.username','担当者')?></th><th><?= $this->Paginator->sort('Endclient','エンドクライアント')?></th><th>操作</th><tr>
            </thead>
            <tbody>
              <?php $counter = 0;$person = "";?>
              <?php foreach($clients as $client):?>
                <?php if($person != $client->project->name): $counter = $counter + 1;?>
                <?php else: $counter = $counter;?>
                <?php endif;?>
                <?php $person = $client->project->name;?>
                <?php if($counter % 2 == 0):?>
                  <tr class="gray_background" data-paidstatuse = "<?= h($client->paidstatus->statuse_name)?>" data-username="<?= h($client->first_name)?><?= h($client->last_name) ?>" data-client-name-ruby="<?= h($client->first_name_ruby) . h($client->last_name_ruby)?>" data-birthday="<?= h($client->birthday)?>" data-phone-number ="<?= h($client->phone_number)?>" data-projectname="<?= h($client->project->name)?>" data-groupname="<?= h($client->universities_name) ?>">
                <?php else:?>
                    <?php /*<tr class="gray_background" data-paidstatuse = "<?= h($client->paidstatus->status_name)?>" data-username="<?= h($client->first_name)?><?= h($client->last_name) ?>" data-birthday="<?= h($client->birthday)?>" data-phone-number ="<?= h($client->phone_number)?>" data-client-name-ruby="<?= h($client->first_name_ruby) . h($client->last_name_ruby)?>" data-projectname="<?= h($client->project->name)?>" data-groupname="<?= h($client->universities_name) ?>">*/?>
                    <tr class="gray_background" data-paidstatuse = "<?= h($client->paidstatus->status_name)?>" data-username="<?= h($client->first_name)?><?= h($client->last_name) ?>" data-birthday="<?= h($client->birthday)?>" data-phone-number ="<?= h($client->phone_number)?>" data-client-name-ruby="<?= h($client->first_name_ruby) . h($client->last_name_ruby)?>" data-projectname="<?= h($client->project->name)?>" data-groupname="<?= h($client->universities_name) ?>">
                <?php endif;?>
                    <td><?= $this->Html->link(__(h($client->first_name) . ' ' . h($client->last_name)), ['action' => 'view', $client->id]) ?> (<?php echo (int)((date( "Ymd" ) - intval(str_replace("/", "", $client->birthday)))/10000);?>)</td>
                    <td><?= $client->has('sex') ? h($client->sex->name) : ''?></td>
                    <td><?= h($client->first_name_ruby)?> <?= h($client->last_name_ruby)?></td>
                    <td><?= $this->Number->format($client->evaluation) ?></td>
                    <td><?= h($client->universities_name) ?></td>
                    <td><?= $client->has('project') ? $this->Html->link($client->project->name, ['controller' => 'Projects', 'action' => 'view', $client->project->id]) : '' ?></td>
                    <td><?= $client->has('manager') ? $this->Html->link($client->manager->username, ['controller' => 'Managers', 'action' => 'view', $client->manager->id]) : '' ?></td>
                    <td><?= $client->has('endclient') ? $this->Html->link($client->endclient->name,['controller' => 'Endclients' , 'action' => 'view', $client->endclient->id]) :''?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('修正'), ['action' => 'edit', $client->id]) ?>
                        <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $client->id], ['confirm' => __('本当に削除してもよろしいですか？ # {0}?', $client->id)]) ?>
                    </td>
                  </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
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
