<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/header.php");
?>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <h1>글쓰기</h1>
    <form id="frm"action="./upload.php" method="post" enctype="multipart/form-data">
        <span><img id='test' src=''></span>
    <!-- <form id="frm"action="../boardinsert.php" method="post" enctype="multipart/form-data"> -->
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        <input type="hidden" name="user_name" value="<?=$user_name?>">
        <div>
            <input type="file" value="1" name="userfile" multiple onchange="readURL(this)">
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
    <script>
        function readURL(input)
        {
            if(input.files && input.files[0]){
                var reader = new FileReader;
                reader.onload = function(e){
                $('#test').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>