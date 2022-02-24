<?
    session_start(); // 새로운 세션을 시작하거나 , 기존의 세션을 다시 시작;
                     // 어떤 헤더보다도 먼저 작성해야함 (제일 위에);

    $_SESSION['city'] = "대구";  // 세션 변수 등록
    echo "저는 {$_SESSION['city']}사람 입니다.";

    unset($_SESSION['city']);   // 특정이름의 세션 변수만을 해지
    session_unset();            // 모든 세션 변수의 등록 해지
    session_destroy();          // 세변 아이디자체를 삭제 
?>