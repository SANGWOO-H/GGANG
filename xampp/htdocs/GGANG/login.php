<?php
    require_once ("db.php");
    require_once  ("lib.php");
    require_once  ("header.php");
?>
<style>
form{
    margin-bottom: 80px;
}
</style>
<section class="mt-4"><div class="row my-5">
    <div class="col-10 offset-1"><h3 style="margin-bottom:-20px;">로그인</h3></div></div>
        <div class="row"><div class="col-10 offset-1">
            <form action="/login_process.php" method="post">
                <div class="form-group">
                    <label for="userid">아이디</label>
                    <input type="text" name="userid" id="userid" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" name="password" id="password" class="form-control"> 
                </div>
                <button type="submit" class="btn btn-info" style="margin-top:20px;">로그인</button>
            </form>
        </div>
    </div>
</section>