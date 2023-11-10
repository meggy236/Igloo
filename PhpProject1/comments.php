<?php
    include_once 'DBConnection.php';
    

switch ($_POST['req']) {
  // (B) SHOW COMMENTS
  case "show";
    // (B1) GET ALL COMMENTS
    try {
      $stmt = $pdo->prepare("SELECT `user_id`, `text` FROM `comments` WHERE `comment_id`=? ");
      $stmt->execute([$_POST['pid']]);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }

    // (B2) LOOP & GENERATE HTML
    while ($r = $stmt->fetch(PDO::FETCH_NAMED)) { ?>
        <div class="cname"><?=$r['name']?></div>
        <div class="ctime">[<?=$r['timestamp']?>]</div>
      <div class="cmsg"><?=$r['text']?></div>
    <?php }
    break;
 
  // (C) ADD COMMENT
  case "add":
    // (C1) CHECKS
    if (!isset($_POST['pid']) || !isset($_POST['user_id']) || !isset($_POST['text'])) {
      die("Please provide the Post ID, name, and message");
    }

    // (C2) INSERT
    try {
      $stmt = $pdo->prepare("INSERT INTO `comments` (`comment_id`, `user_id`, `text`) VALUES (?,?,?)");
      $stmt->execute([$_POST['pid'], htmlentities($_POST['name']), htmlentities($_POST['msg'])]);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
    echo "OK";
    break;
}

// (D) CLOSE DATABASE CONNECTION
$stmt = null;
$pdo = null;