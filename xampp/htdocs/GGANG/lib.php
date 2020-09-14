<?php

session_start();

function dump($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function msgGo($msg, $url){
    echo "<script>";
    echo "alert('$msg');";
    echo "location.href='$url';";
    echo "</script>";
}

function msgBack($msg){
    echo "<script>";
    echo "alert('$msg');";
    echo "history.back()";
    echo "</script>";
}

function checkLogin(){
    if(!isset($_SESSION['user'])){
        msgGo('로그인 후 이용가능합니다.','login.php');
        exit;
    }
}

