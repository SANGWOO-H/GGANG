<?php
//127.0.0.1 == localhost
$host = "localhost";
$dbname = "test";
$charset = "utf8mb4";
$user = "root";
$pass = "";
$str = "mysql:host={$host}; dbname={$dbname}; charset={$charset}";

$options=[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //mysql 오류를 화면에 보여줌
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    //select 테이블을 가져올 때 기본적으로 배열을 가져옴
    //객체로 가져왔으면 좋겠다!
];

$db = new PDO($str, $user, $pass, $options);
//php data object : 인스턴스 객체
//db 연동시킨 객체

//$sql = "SELECT * FROM users";
function fetchAll($db, $sql,$param=[]){
    $q = $db -> prepare($sql);
   $q -> execute($param); // mysql실행 
   return $q ->  fetchAll();
}

function fetch($db, $sql,$param=[]){
    $q = $db -> prepare($sql);
    $q -> execute($param);
    return $q ->  fetch();
}


function execute($db,$sql,$param=[]){
    $q = $db -> prepare($sql);
    return $q -> execute($param);
}

define("HOME", __DIR__);
// var_dump($db); DB연동 확인
//echo HOME; C:\xampp\htdocs\phpProject 현재 경로