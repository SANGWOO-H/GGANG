<?php

include("lib.php");
include("db.php");


$inputID = $_POST['userid'];
$inputPW = $_POST['password'];

$sql = "SELECT * FROM users WHERE id = ? AND password = ?";
$user = fetch($db, $sql, [$inputID,$inputPW]);

if($user!=null){
    $_SESSION['user'] = $user;
    msgGo($user->name . '님 반갑습니다','index.php');
    exit;
}else{
    msgGo('아이디와 비밀번호를 다시 확인해주세요','login.php');
}

// for($i = 0; $i < count($userList); $i++){
//     if($_SESSION['id'] == $inputID && $_SESSION['password'] == $inputPW){
//         msgGo($userList[$i]['name'] . '님 반갑습니다','index.php');
//     }
// }

// for($i = 0; $i < count($userList); $i++){
//     if($_SESSION['id'] != $inputID || $_SESSION['password'] != $inputPW){
//         msgGo('아이디와 비밀번호를 다시 확인해주세요','login.php');
//     }
// }