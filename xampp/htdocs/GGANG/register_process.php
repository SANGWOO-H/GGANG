<?php
include("db.php");
include("lib.php");

$id = $_POST['userid'];
$name = $_POST['username'];
$password = $_POST['password'];
$check = $_POST['passwordc'];
$sql = "SELECT * FROM users WHERE id = ?";
$user = fetch($db, $sql, [$id]);

if($user != null){
    msgBack('아이디 중복','register.php');
    exit;
}

if(strlen($password) < 8){
    msgGo('비밀번호는 영문,숫자 혼합 8자리 이상이어야 합니다.','register.php');
    exit;
}

$isNum = false;
if(!empty($password));
$isNum = is_numeric($password);
if($isNum){
    msgBack('비밀번호는 한 개 이상 문자를 포함해야 합니다.','register.php');
    exit;
}

if($password != $check){
    msgGo('비밀번호가 일치하지 않습니다.','register.php');
    exit;
}

if(strlen($id) == 0){
    msgGo('아이디를 입력하지 않았습니다.','register.php');
    exit;
}else if(strlen($name) == 0){
    msgGo('이름을 입력하지 않았습니다.','register.php');
    exit;
}else if(strlen($password == 0 && strlen($check) == 0)){
    msgGo('비밀번호를 입력하지 않았습니다.', 'register.php');
    exit;
}


$sql = "INSERT INTO users VALUES(?,?,?,1)";
execute($db,$sql,[$id,$name,$password]);
msgGo('회원가입이 정상적으로 처리되었습니다.', 'login.php');