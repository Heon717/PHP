<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write</title>
</head>
<body>
    <h1>글쓰기</h1>
    <form action="insert.php" method="post">
        <p>
            <label for="name">제목:</label>
            <input type="text" name="name" id="name">
        </p>
        <p>
            <label for="name">내용:</label>
            <textarea  name="content" id="content"></textarea>
        </p>
        <input type="submit">
    </form>
</body>
</html>