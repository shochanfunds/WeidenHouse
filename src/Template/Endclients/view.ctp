<?php
/**
  * @var \App\View\AppView $this
  */
?>
  <div class="info-box">
    <table>
      <tr>
        <td>担当者名</td>
        <td><?= h($endclient->name) ?></td>
      </tr>
      <tr>
        <td>所在地</td>
        <td><?= h($endclient->address) ?></td>
      </tr>
      <tr>
        <td>会社名</td>
        <td><?= h($endclient->charged_person) ?></td>
      </tr>
      <tr>
        <td>部署</td>
        <td><?= h($endclient->capital_stock) ?></td>
      </tr>
      <tr>
        <td>代表電話番号</td>
        <td><?= h($endclient->phone_number) ?></td>
      </tr>
  <?php /*
      <tr>
        <td>事業内容</td>
        <td>ソフトウェア開発・人工知能事業</td>
      </tr>
  */?>
      <tr>
        <td></td>
      </tr>
    </table>
  </div>
<?php /*
  <div class="map-img">
    <img src="img/map.png" alt="地図">
  </div>
*/?>
