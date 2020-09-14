<?php
session_start();
include_once("lib.php");

if(!isset($_SESSION['user'])){
    msgGo('로그인 후 이용가능합니다.','login.php');
}

unset($_SESSION['user']);
//$_SESSION= array(); //전체 세션지우기
msgGo("로그아웃 완료","index.php");