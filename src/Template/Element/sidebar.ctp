<div class="col-md-2 sidebar">
  <ul id="sidebar_list" class="list-unstyled">
  <li class="sidebar_tag">運用システム管理</li>
    <li>
      <p>
        エンドクライアント管理
        <ul class="list-unstyled">
          <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'endclients' ,'action' => 'index']); ?></li>
          <li><?php echo $this->Html->link('登録', ['controller' => 'endclients','action' => 'add']); ?></li>
          <li><?php echo $this->Html->link('編集', ['controller' => 'endclients' ,'action' => 'edit']); ?></li>
        </ul>
      </p>
    </li>
  <li>
    <p>運用者管理</p>
    <ul class="list-unstyled">
      <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'managers' , 'action' => 'index']); ?></li>
      <li><?php echo $this->Html->link('登録' ,['controller' => 'managers' ,'action' =>'add']); ?></li>
      <li><?php echo $this->Html->link('編集' ,['controller' => 'managers' ,'action' => 'edit']);?></li>
    </ul>
  </li>
  <li>
    <p>インタビュー対象者管理</p>
    <ul class="list-unstyled">
      <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'clients' , 'action' => 'index']); ?></li>
      <li><?php echo $this->Html->link('登録' ,['controller' => 'clients' ,'action' =>'add']); ?></li>
      <li><?php echo $this->Html->link('編集' ,['controller' => 'clients' ,'action' => 'edit']);?></li>
    </ul>
  </li>
  <li>
    <p>謝礼理由管理</p>
    <ul class="list-unstyled">
      <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'pay_reasons' , 'action' => 'index']); ?></li>
      <li><?php echo $this->Html->link('登録' ,['controller' => 'pay_reasons' ,'action' =>'add']); ?></li>
      <li><?php echo $this->Html->link('編集' ,['controller' => 'pay_reasons' ,'action' => 'edit']);?></li>
    </ul>
  </li>
  <li>
    <p>謝礼支払状況管理</p>
    <ul class="list-unstyled">
      <li><?php echo $this->Html->link('一覧表示' ,['controller' => 'paidstatuses' , 'action' => 'index']); ?></li>
      <li><?php echo $this->Html->link('登録' ,['controller' => 'paidstatuses' ,'action' =>'add']); ?></li>
      <li><?php echo $this->Html->link('編集' ,['controller' => 'paidstatuses' ,'action' => 'edit']);?></li>
    </ul>
  </li>
    <li><?php echo $this->Html->link('→Topへ戻る' ,['controller' => 'clients' ,'action' => 'index']); ?></li>
    <li class="sidebar_tag">謝礼管理</li>
    <li><?php echo $this->Html->link('インタビュー対象者一覧',['controller' => 'clients' , 'action' => 'index']);?></li>
    <li><a href="#">Excelエクスポート</a></li>
    <li><a href="./payinfo.php">支払状況確認</a></li>
    <li><?php echo $this->Html->link('→Topへ戻る' ,['controller' => 'clients' ,'action' => 'index']); ?></li>
  </ul>
</div>
