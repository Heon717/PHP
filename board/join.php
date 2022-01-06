<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>join</title>
</head>
<body>
    <h1>회원가입 페이지</h1>
    <form method="post" action="joininsert.php">
        <div><input type="text" name="id" id="id" placeholder="사용자 아이디"></div>
        <div><input type="password" name="pw" id="pw" placeholder="비밀번호"></div>
        <div><input type="password" name="pw_confirm" id="pw_confirm" placeholder="비밀번호확인"></div>
        <div><input type="text" name="name" id="name" placeholder="사용자 이름"></div>
        <div><input type="submit" value="회원가입"></div>
    </form>
    <?php 
        if( $wu == 1) {
            echo "사용자 아이디가 중복되었습니다.";
        }
        if ($wp == 1) {
            echo "비밀번호가 일치하지 않습니다.";
        }
    ?>
</body>
</html>