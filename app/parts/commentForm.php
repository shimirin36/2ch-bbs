<form class="formWrapper" method="post">
  <div>
    <input type="submit" value="書き込む" name="submitButton">
    <label>名前：</label>
    <input type="text" name="username">
    <input type="hidden" name="threadId" value="<?php echo $thread["id"]; ?>">
  </div>
  <div>
    <textarea class="commentTextArea" name="inputComment"></textarea>
  </div>
</form>