<?php
    include_once ("db.php");
    include_once ("lib.php");
    checkLogin(); //로그인검사하는 로직

    include_once ("header.php");
?>

<section class="mt-4">
    <div class="row my-5">
        <div class="col-10 offset-1">
            <h1>글 작성하기</h1>
        </div>
    </div>

    <div class="row" style="margin-bottom:100px;">
        <div class="col-10 offset-1">
            <form action="/write_process.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">제목</label>
                    <input type="text" name="title" id="title" placeholder="글 제목" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">글 내용</label>
                    <textarea class="form-control" name="content" id="content" rows="8"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="file">업로드 파일</label>
                    <input type="file" class="form-control-file" name="pic" id="file">
                </div> -->
                <button type="submit" class="btn btn-success">작성완료</button>
            </form>
        </div>
    </div>
</section>