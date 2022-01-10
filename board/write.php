<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../smarteditor2-master/workspace/static/js/service/HuskyEZCreator.js" charset="utf-8"></script>
    <script>

    function save(){
        oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);  
                //스마트 에디터 값을 텍스트컨텐츠로 전달
        var content = document.getElementById("smartEditor").value;
        alert(document.getElementById("content").value); 
                // 값을 불러올 땐 document.get으로 받아오기
        return; 
}

</script>
    <title>Write</title>
</head>
<body>
    
    <h1>글쓰기</h1>
    <form action="boardinsert.php" method="post" enctype="multipart/form-data">
        <div>
            <input type="file" value="1" name="userfile">
        </div>
        <p>
            <label for="title">제목:</label>
            <input type="text" name="title" id="title">
        </p>
        <p>
            <label for="content">내용:</label>
            <textarea  name="content" id="content" row="10" cols="90"></textarea>
        </p>
        <input type="submit">
    </form>
    <script type="text/javascript">
        var oEditors = [];
        nhn.husky.EZCreator.createInIFrame({
            oAppRef: oEditors,
            elPlaceHolder: "content",
            sSkinURI: "../smarteditor2-master/workspace/static/SmartEditor2Skin.html",
            fCreator: "createSEditor2"
        });
        </script>
        <!-- <script id="smartEditor" type="text/javascript">
            var oEditors= [];
            nhn.husky.EZCreator.createinFrame({ 
                oAppRef :oEditors,
                elPlaceHolder: "content",
                sSkinURI: "../smarteditor2-master/workspace/static/SmartEditor2Skin.html",
                htParams: { 
                    // 툴바 사용여부 (true: 사용, false: 미사용) 
                    bUseToolbar: true,
                    // 입력창 크키 조절바 사용여부 (true: 사용, false: 미사용)
                    bUseVerticalResizer: false, // 모드 탭(Editor | HTML | TEXT) 사용여부 (true: 사용, false: 미사용)
                    bUseModeChanger: false 
                }}); </script> -->
</body>
</html>