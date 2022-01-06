<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <p style='text-align:right'>
        <?php
            if(isset($_SESSION) === false) {
                session_start();
            }
            if(isset($_SESSION['id']) === false) {
        ?>
            <a href="join.php">회원가입</a>
            <a href="login.php">로그인</a>
            <?php 
            } else {
            ?>
            <a href="#">로그아웃</a>
            <?php
            }
            ?>
        </p>
    </div>
</body>
</html>