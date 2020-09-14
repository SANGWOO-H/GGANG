<?php
    require_once("lib.php");
    require_once("db.php");
    require_once("header.php");

    if(!isset($_SESSION['user'])){
        msgGo('로그인 후 이용가능합니다.','login.php');
        exit;
    }
    if(!isset($_GET['id'])){
        msgGo('리스트 먼저 가셈.','list.php');
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $user = fetch($db,$sql,[$id]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?= $user->name ?>님 회원 정보</h2>
    <form action="update_user_pro.php" method="POST">
        <input type="text" name="name" placeholder="이름" class="name" value="<?= $user->name ?>">
        <input type="password" name="password" placeholder="비밀번호" class="password">
        <input type="submit" value="수정하기" class="register">
        <input type="hidden" name="id" value="<?= $user->id ?>">
        <input type="hidden" name="Realpassword" value="<?= $user->password ?>">
    </form>
</body>
</html>
<?php require_once("footer.php"); ?>