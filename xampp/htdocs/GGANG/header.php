<?php
    include_once("lib.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루에 몇 깡하세요?</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Do Hyeon', sans-serif;
        }
    </style>
</head>
<body>
    <!-- <div class="container"> -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">하루에 몇 깡하세요?</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="board.php">게시판</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['user'])) : ?>
                <div>
                    <a class="btn btn-primary"><?= $_SESSION['user']->name ?></a>
                    <a href="logout.php" class="btn btn-danger">로그아웃</a>
                </div>
                <?php else : ?>
                    <div>
                        <a href="register.php" class="btn btn-info">회원가입</a>
                        <a href="login.php" class="btn btn-info">로그인</a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
        <div class="center">