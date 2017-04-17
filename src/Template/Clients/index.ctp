<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <?php
           /*
            特定の条件に当てはまるクライアント一覧を表示する画面
           */
          ?>
          <?php echo $this->element('seachform');?>


          <p class="clients-title">インタビュー対象者一覧 (全て)</p>
          <table class="table">
            <thead>
                <tr><th>名前 (年齢)</th><th>所属</th><th>プロジェクト名</th><th>担当者</th><th>エンドクライアント</th><th>支払額</th><th>支払日</th><th>支払状況</th><tr>
            </thead>
            <tbody>
              <?php $counter = 0;$person = "";?>
              <?php foreach($clients as $client):?>
                <?php if($person != $client->endclient->name): $counter = $counter + 1;?>
                <?php else: $counter = $counter;?>
                <?php endif;?>
                <?php $person = $client->endclient->name;?>
                <?php if($counter % 2 == 0):?>
                  <tr  data-username="<?= h($client->first_name)?><?= h($client->last_name) ?>" data-projectname="<?= h($client->project->name)?>" data-groupname="<?= h($client->universities_name) ?>">
                <?php else:?>
                  <tr class="gray_background" data-username="<?= h($client->first_name)?><?= h($client->last_name) ?>" data-projectname="<?= h($client->project->name)?>" data-groupname="<?= h($client->universities_name) ?>">
                <?php endif;?>
                    <td><?= $this->Html->link(__(h($client->first_name) . ' ' . h($client->last_name)), ['action' => 'view', $client->id]) ?> (<?= h($client->age)?>) <?= $client->has('sex') ? $this->Html->link($client->sex->name, ['controller' => 'Sexes', 'action' => 'view', $client->sex->id]) : '' ?></td>
                    <td><?= h($client->universities_name) ?></td>
                    <td><?= $client->has('project') ? $this->Html->link($client->project->name, ['controller' => 'Projects', 'action' => 'view', $client->project->id]) : '' ?></td>
                    <td><?= $client->has('manager') ? $this->Html->link($client->manager->username, ['controller' => 'Managers', 'action' => 'view', $client->manager->id]) : '' ?></td>
                    <td><?= $client->has('endclient') ? $this->Html->link($client->endclient->name,['controller' => 'Endclients' , 'action' => 'view', $client->endclient->id]) :''?></td>
                    <td><?= $this->Number->format($client->fee) ?></td>
                    <td>2017/4/1</td>
                    <td class="green_text"><?= $client->has('paidstatus') ? $this->Html->link($client->paidstatus->status_name, ['controller' => 'Paidstatuses', 'action' => 'view', $client->paidstatus->id]) : '' ?></td>
                  </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="pagination">
      <ul class="list-unstyled list-inline">
        <li><a href="#">戻る</a></li>
        <li><a class="now-hear" href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">次へ</a></li>
      </ul>
    </div>
