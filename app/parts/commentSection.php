<?php
include("app/functions/comment_get.php");

?>

<section>
  <article>
    <?php foreach ($comment_array as $value) : ?>
      <?php if ($thread["id"] == $value["thread_id"]) : ?>
        <div class="wrapper">
          <div class="nameArea">
            <span>名前：</span>
            <p class="username"><?php echo $value["user_name"] ?></p>
            <time>：<?php echo $value["post_date"] ?></time>
          </div>
          <p class="comment"><?php echo $value["body"] ?></p>
        </div>
      <?php endif; ?>
    <?php endforeach ?>
  </article>
</section>