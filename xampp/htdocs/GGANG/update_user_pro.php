<?php

    require_once("lib.php");
    require_once("db.php");

    if(!isset($_SESSION['user'])){
        msgGo('로그인 후 이용가능합니다.','login.php');
        exit;
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $realpass = $_POST['Realpassword'];
    
    if($password != $realpass){
        msgBack('비밀번호가 일치하지 않습니다.');
        exit;
    }

    $sql = "UPDATE users SET `name` =  ? WHERE id = ?";
    execute($db, $sql, [$name, $id]);
    unset($_SESSION['user']);
    msgGo('회원 정보가 변경되었습니다. 로그인을 다시 해주세요.','login.php'); 