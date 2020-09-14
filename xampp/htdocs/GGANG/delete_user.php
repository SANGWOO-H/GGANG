<?php
    require_once("lib.php");
    require_once("db.php");

    if(!isset($_SESSION['user'])){
        msgGo('로그인 후 이용가능합니다.','login.php');
        exit;
    }

    if(!isset($_GET['id'])){
        msgGo('로그인 후 이용가능합니다.','login.php');
        exit;
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = ?";
    execute($db,$sql,[$id]);
    msgGo('회원탈퇴가 정상적으로 처리되었습니다', 'list.php');