<?php
include("lib.php");
include("db.php");
include("header.php");

if(!isset($_SESSION['user'])){
    msgGo('로그인 후 이용가능합니다.','login.php');
    exit;
}
if(!isset($_GET['id'])){
    msgGo('접근 오류','board.php');
    exit;
}

$user = $_SESSION['user'];
$id = $_GET['id'];
$sql = "SELECT * FROM boards WHERE id = ?";
$board = fetch($db,$sql,[$id]);
$readCnt = $board->readCnt;
$readCnt+=1;
$sql = "UPDATE boards SET `readCnt` =? WHERE id=?";
$checkSQL = execute($db,$sql,[$readCnt,$id]);

if(!$checkSQL){
    msgBack('SQL문 실행오류');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .title{
            font-size:40px;
            margin-left:25px;
            margin-top:15px;
            margin-bottom:30px;
        }
        .text{
            font-size:20px;
            margin-left:30px;
            margin-top:20px;
        }
        .readCnt{
            float:right;
            margin-top:-35px;
            margin-right:10px;
        }
    </style>
</head>
<body>
    <div style="border-bottom:1px solid rgba(0,0,0,0.3);">
        <p class="title"><?=$board->title?></p>
        <p class="readCnt">글쓴이 : <?=$board->writer?>&nbsp;&nbsp;&nbsp;조회수 : <?=$board->readCnt?></p>
    </div>
    <p class="text"><?=$board->content?></p>
</body>
</html>