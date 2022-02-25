<?
    uniqid();   // 유니크 ID를 생성하는 함수
                // 기본 16진수 13자리 , UNIX_TIMESTEMP 값을 변형한 것이다.
                // 매개 변수를 넣으면 접두어로 붙는다.
    
    echo uniqid();  //ex) 4b3403665fea6 
    echo uniqid('test');  //ex) test_4b3403665fan4
?>