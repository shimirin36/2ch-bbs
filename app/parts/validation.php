<!-- バリデーションチェックの出力 -->
<?php if (isset($error_msg)) : ?>
  <ul class="errorMsg">
    <?php foreach ($error_msg as $error) : ?>
      <li><?php echo $error ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>