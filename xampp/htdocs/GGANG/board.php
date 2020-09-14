<?php
    include_once("lib.php");
    include_once("db.php");
    
    if(!isset($_SESSION['user'])){
        msgGo('로그인 후 이용가능합니다.','login.php');
        exit;
    }
    if(isset($_SESSION['writer'])){
        $writer = $_SESSION['writer'];
        $sql = "SELECT * FROM boards WHERE writer = ?";
        $boardList = fetchAll($db, $sql,[$writer]);
    }else{
        $sql = "SELECT * FROM boards";
        $boardList = fetchAll($db, $sql);
    }

    include_once("header.php");

    $flag;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
</head>
<body>
    <h3 style="margin-top:20px; margin-left:10px;">자유게시판</h3>
    <p style="opacity:0.6; margin-left:10px;">자유롭게 글을 쓸 수 있는 게시판입니다.</p>
    <table class="table" style="text-align:center;">
    <!-- <thead>
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">글쓴이</th>
            <th scope="col">조회수</th>
        </tr>
    </thead> -->
    <!-- <thead class="thead-dark">
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">글쓴이</th>
            <th scope="col">조회수</th>
        </tr>
    </thead> -->
    <thead class="thead-light">
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">글쓴이</th>
            <th scope="col">조회수</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; foreach($boardList as $user) : $i++; ?>
            <tr style="text-align:center;">
                <td><?= $i ?></td>
                <td><a href="view.php?id=<?=$user->id?>"><?= $user->title?></a></td>
                <td><?= $user->writer ?></td>
                <td><?= $user->readCnt ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <a href="/write.php" class="btn btn-info" style="float:right; margin-right:10px;">글쓰기</a> &nbsp
    <?php
    if(!isset($_SESSION['writer'])){
        $_SESSION['writer'] = $_SESSION['user']->name ?>
        <a href="/board.php" class="btn btn-info" style="float:right; margin-right:10px;">내 글 보기</a>
    <?php }else{
        unset($_SESSION['writer']) ?>
        <a href="/board.php" class="btn btn-info" style="float:right; margin-right:10px;">전체글 보기</a>
    <?php } ?>
</body>
</html>