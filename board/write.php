<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="../smarteditor2-2.8.2.3/js/HuskyEZCreator.js" charset="utf-8"></script>

    <title>Write</title>
</head>
<body>
    <h1>글쓰기</h1>
    <form id="frm"action="boardinsert.php" method="post" enctype="multipart/form-data">
        <div>
            <input type="file" value="1" name="userfile">
        </div>
        <p>
            <label for="title">제목:</label>
            <input type="text" name="title" id="title">
        </p>
            <label for="content">내용:</label>
            <textarea  name="content" id="content" rows="30" cols="100"></textarea>

        <input type="submit" id="save_btn" value="작성">
    </form>
    <script type="text/javascript">
        var oEditors = [];
        nhn.husky.EZCreator.createInIFrame({
            oAppRef: oEditors,
            elPlaceHolder: "content",
            sSkinURI: "../smarteditor2-2.8.2.3/SmartEditor2Skin.html",
            fCreator: "createSEditor2"
        });
        // $('#save_btn').click(function() {
        //     oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
        //     $("#frm").submit();
        // })
        </script>
</body>
</html>