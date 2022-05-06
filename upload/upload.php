<?
    include $_SERVER["DOCUMENT_ROOT"]."/inc/header.php";
?>
<div class='wrap'>
    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <input type="file" class="" name="myfile">
        <input type="submit" class="btn" value="업로드">
    </form>
</div>