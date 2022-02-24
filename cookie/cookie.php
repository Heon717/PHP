<?
    // 쿠키는 로그인정보나 , 장바구니 정보를 저장하는 용도로 많이 사용됨.
    
    setcookie('쿠키이름','값','만료시간/초단위','경로');
    
    // ex)
    setcookie("cookie","setcookie",time()+3600, "/");

    // 쿠키 사용방법
    echo $_COOKIE["cookie"]; // setcookie

    // 쿠키 삭제방법
    // 방법1
    setcookie("cookie"."",0,"/");
    echo $_COOKIE["cookie"]; // ''

    // 방법2
    unset($_COOKIE["cookie"]);
    echo $_COOKIE["cookie"]; // ''
?>