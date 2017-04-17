<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PersonalTool</title>

    <!--CSS-->
    <?= $this->Html->css('bootstrap.min.css')?>
    <?= $this->Html->css('style.css')?>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php if(!strpos($_SERVER["PHP_SELF"],'login')):?>
    <header class="container-fluid col-md-12 header-wrapper">
      <p class="col-md-8 system-title"><a>PersonalTool<a></p>
      <nav class="row col-md-4 header-navigation">
        <ul class="list-unstyled list-inline text-right nav-list">
          <li><?php echo $this->Html->link('エンドクライアント管理',['controller' => 'endclients' , 'action' => 'index']);?></li>
          <li><?php echo $this->Html->link('運用者管理',['controller' => 'managers' , 'action' => 'index']);?></li>
          <li><?php echo $this->Html->link('謝礼管理',['controller' => 'clients' , 'action' => 'index']);?></li>
          <li><a href="#"></a></li>
        </ul>
      </nav>
    </header>
  <?php endif;?>
  <?= $this->Flash->render(); ?>

  <?= $this->fetch('content') ?>

  <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
  <?= $this->Html->script('action.js')?>
  <?= $this->Html->script('bootstrap.min.js')?>
  <?= $this->fetch('script') ?>
</body>
</html>
