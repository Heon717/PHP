<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="uploadExam.php" enctype="multipart/form-data">
        <input type="hidden" value="30000" name="MAX_FILE_SIZE">
        <input type="file" name="userfile">
        <input type="submit" name="upload" value="업로드">
    </form>
</body>
</html>