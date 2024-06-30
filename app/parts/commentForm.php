<?php
$position = 0;
if (isset($_POST["submitButton"])) {
  $position = $_POST["position"];
}
?>

<form class="formWrapper" method="post">
  <div>
    <input type="submit" value="書き込む" name="submitButton">
    <label>名前：</label>
    <input type="text" name="username" value="<?php if ($thread["id"] == $value["thread_id"]) echo $_SESSION["username"]; ?>">
    <input type="hidden" name="threadId" value="<?php echo $thread["id"]; ?>">
  </div>
  <div>
    <textarea class="commentTextArea" name="inputComment"></textarea>
  </div>
  <!-- 位置取得用タグ -->
  <input type="hidden" name="position" value="0">
</form>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
  // console.log($(window).scrollTop());

  $(document).ready(() => {
    $("input[type=submit]").click(() => {
      // 現在のスクロール位置を取得
      let position = $(window).scrollTop();
      $("input:hidden[name=position]").val(position);
    })
    $(window).scrollTop(<?php echo $position; ?>)
  })
</script>