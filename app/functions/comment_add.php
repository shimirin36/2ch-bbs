<?php
$error_msg = array();

if (isset($_POST["submitButton"])) {
  //名前のバリデーション
  if (empty($_POST["username"])) {
    $error_msg["username"] = "名前を入力してください";
  } else {
    // エスケープ処理
    $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "utf-8");
  }
  //コメントのバリデーション
  if (empty($_POST["inputComment"])) {
    $error_msg["inputComment"] = "コメントを入力してください";
  } else {
    // エスケープ処理
    $escaped["inputComment"] = htmlspecialchars($_POST["inputComment"], ENT_QUOTES, "utf-8");
  }

  if (empty($error_msg)) {
    $post_date = date("Y-m-d H:i:s");

    // トランザクションの開始
    $pdo->beginTransaction();
    try {
      $sql = "INSERT INTO `comment` (`user_name`, `body`, `post_date`, `thread_id`) VALUES (:username, :inputComment, :post_date, :thread_id)";
      $statement = $pdo->prepare($sql);

      //値をセットする
      $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
      $statement->bindParam(":inputComment", $escaped["inputComment"], PDO::PARAM_STR);
      $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
      $statement->bindParam(":thread_id", $_POST["threadId"], PDO::PARAM_STR);

      $statement->execute();

      $pdo->commit();
    } catch (Exception $err) {
      $pdo->rollBack();
    }
  }
}
