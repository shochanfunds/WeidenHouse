<div class="col-md-2 sidebar">
  <ul id="sidebar_list" class="list-unstyled">
  <li class="sidebar_tag">運用システム管理</li>
    <li>
      <p>インタビュー対象者管理</p>
      <ul class="list-unstyled">
        <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'clients' , 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('支払情報確認' ,['controller' => 'clients', 'action' => 'paidornot']);?></li>
        <li><?php echo $this->Html->link('登録' ,['controller' => 'clients' ,'action' =>'add']); ?></li>
        <li><?php echo $this->Html->link('タグ付け',['controller' => 'clients-projects','action' => 'add']);?></li>
      </ul>
    </li>
    <li>
      <p>
        エンドクライアント管理
        <ul class="list-unstyled">
          <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'endclients' ,'action' => 'index']); ?></li>
          <li><?php echo $this->Html->link('登録', ['controller' => 'endclients','action' => 'add']); ?></li>
        </ul>
      </p>
    </li>
  <li>
    <p>運用者管理</p>
    <ul class="list-unstyled">
      <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'managers' , 'action' => 'index']); ?></li>
      <li><?php echo $this->Html->link('登録' ,['controller' => 'managers' ,'action' =>'add']); ?></li>
    </ul>
  </li>
  <li>
    <p>
      プロジェクト管理
      <ul class="list-unstyled">
        <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'projects' ,'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('登録', ['controller' => 'projects','action' => 'add']); ?></li>
      </ul>
    </p>
  </li>
  <li>
    <p>謝礼理由管理</p>
    <ul class="list-unstyled">
      <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'pay_reasons' , 'action' => 'index']); ?></li>
      <li><?php echo $this->Html->link('登録' ,['controller' => 'pay_reasons' ,'action' =>'add']); ?></li>
    </ul>
  </li>
  <li>
    <p>謝礼支払状況管理</p>
    <ul class="list-unstyled">
      <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'paidstatuses' , 'action' => 'index']); ?></li>
      <li><?php echo $this->Html->link('登録' ,['controller' => 'paidstatuses' ,'action' =>'add']); ?></li>
    </ul>
  </li>
    <li><?php echo $this->Html->link('→Topへ戻る' ,['controller' => 'clients' ,'action' => 'index']); ?></li>
    <li class="sidebar_tag">拡張機能</li>
    <li><a href="#">Excelエクスポート</a></li>
    <li><?php echo $this->Html->link('→Topへ戻る' ,['controller' => 'clients' ,'action' => 'index']); ?></li>
  </ul>
</div>
