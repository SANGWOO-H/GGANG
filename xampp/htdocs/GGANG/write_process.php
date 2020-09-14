<?php
session_start();

include("db.php");
include("lib.php");

$title = $_POST['title'];
$content = $_POST['content'];

//세션 존재 안하면 나가기 
if(!isset($_SESSION['user'])){
    exit;
}else{
    $user = $_SESSION['user']->name;
}

$sql = "INSERT INTO boards(`title`,`writer`,`content`,`readCnt`) VALUES(?,?,?,0)";
execute($db,$sql,[$title,$user,$content]);
msgGo('글 작성이 완료되었습니다.', 'board.php');