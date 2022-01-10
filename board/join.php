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
    <form method="post" action="joininsert.php" id="join_form">
        <div><input type="text" name="user_id" id="user_id" placeholder="사용자 아이디"></div>
        <div><input type="password" name="user_pw" id="user_pw" placeholder="비밀번호"></div>
        <div><input type="password" name="pw_check" id="pw_check" placeholder="비밀번호확인"></div>
        <div><input type="text" name="name" id="name" placeholder="사용자 이름"></div>
        <div><input type="submit" value="회원가입" id="join_btn"></div>
    </form>
    <?php 
        if( $wu == 1) {
            echo "사용자 아이디가 중복되었습니다.";
        }
        if ($wp == 1) {
            echo "비밀번호가 일치하지 않습니다.";
        }
    ?>
    <script>
        const join_form = document.querySelector('#join_form');
        const user_pw = document.querySelector('#user_pw');
        const pw_check = document.querySelector('#pw_check');
        const join_btn = document.querySelector('#join_btn');

        join_btn.addEventListener("click",(e)=> {
            if(user_pw.value&&user_pw.value === pw_check.value ) {
                join_form.submit();
            } else {
                alert("비밀번호가 서로 일치하지 않습니다.");
            }
        });
        
    </script>
</body>
</html>