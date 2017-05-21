<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <div class="clearfix all_wrapper">

      <!--main contents-->
      <div class="container-fluid col-md-12 clients managers">
        <?= $this->Form->create($manager) ?>
        <div class="form-container">
          <div class="title">
            <p>運営者追加</p>
          </div>
          <form action="index.html" method="post">
            <p>
              <?php echo $this->Form->control('username' ,['label' => '運営者名']);?>
            </p>
            <p>
              <?php echo $this->Form->control('password' ,['label' => 'パスワード']);?>
            </p>
            <p>
              <?php echo $this->Form->control('email' ,['label' => 'Email']);?>
            </p>
            <p>
              <?php echo $this->Form->control('physicalwidth');?>
            </p>
            <p>
              <?php echo $this->Form->control('physicalheight');?>
            </p>
            <p>
              <?php echo $this->Form->control('statuses_id', ['label' => '運営者ステータス' ,'options' => $statuses]);?>
            </p>
            <p>
            </p>
            <div class="input password required">
              <label for="addpassword">アカウント発行パスワード</label>
              <input type="password" id="addpassword" required="required" name="addpassword">
            </div>
          </form>
          <p class="submit-button">
            <?= $this->Form->button(__('送信')) ?>
          </p>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
