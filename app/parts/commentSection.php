<section>
  <article>
    <?php foreach ($comment_array as $value) : ?>
      <div class="wrapper">
        <div class="nameArea">
          <span>名前：</span>
          <p class="username"><?php echo $value["user_name"] ?></p>
          <time>：<?php echo $value["post_date"] ?></time>
        </div>
        <p class="comment"><?php echo $value["body"] ?></p>
      </div>
    <?php endforeach ?>
  </article>
</section>