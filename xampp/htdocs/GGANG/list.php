<?php
    include_once("lib.php");
    include_once("db.php");
    include_once("header.php");
    
    if(!isset($_SESSION['user'])){
        msgGo('로그인 후 이용가능합니다.','login.php');
        exit;
    }

    $sql = "SELECT * FROM users";
    $userList = fetchAll($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원리스트</title>
</head>
<body>
    <h3 style="margin-top:20px; margin-left:10px;">회원리스트</h3>
    <p style="opacity:0.6; margin-left:10px;">자유롭게 회원목록을 수정,삭제할 수 있습니다.</p>
    <table class="table" style="text-align:center;">
        <thead class="thead-light">
            <tr>
                <th scope="col">번호</th>
                <th scope="col">아이디</th>
                <th scope="col">이름</th>
                <th scope="col">레벨</th>
                <th scope="col">관리</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; foreach($userList as $user) : $i++; ?>
                <tr style="text-align:center;">
                    <td><?= $i ?></td>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->level ?></td>
                    <td>
                        <a href="/update_user.php?id=<?= $user->id ?>" style="text-decoration:none; color:black;">수정</a>
                        <a href="/delete_user.php?id=<?= $user->id ?>" style="text-decoration:none; color:black;">삭제</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>