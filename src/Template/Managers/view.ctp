<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="clearfix all_wrapper">
  <?php echo $this->element('sidebar');?>
  <div class="container-fluid col-md-10 clients">
        <div>
          <?php
           /*
            特定の条件に当てはまるクライアント一覧を表示する画面
           */
          ?>

          <p class="clients-title"><?= h($manager->username)?>基本情報</p>
          <table class="table">
            <thead>
                <tr><th>id</th><th>ユーザ名</th><th>email</th><th>ステータス</th><th>作成日</th><th>修正日</th><tr>
            </thead>
            <tbody>
                <tr class="gray_background">
                  <td><?= h($manager->id) ?></td>
                  <td><?= h($manager->username) ?></td>
                  <td><?= h($manager->email) ?></td>
                  <td><?= $manager->has('status') ? $this->Html->link($manager->status->name, ['controller' => 'Statuses' ,'action' => 'view' ,$manager->status->id]) : '' ?></td>
                  <td><?= h($manager->created) ?></td>
                  <td><?= h($manager->modified)?></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
