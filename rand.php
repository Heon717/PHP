<? 
    // 난수를 발생시키는 함수들 (임의의 수를 랜덤으로 생성)
    rand();     
    mt_rand();

    $random1 = rand(10 , 200);     // 매개변수1 , 매개변수2
    $random2 = mt_rand(30, 100);   // 최소값   ~ 최대값의 범위

    
    // rand 와 mt_rand 의 차이점
    // rand 0 ~ 32,767    mt_rand() 0 ~ 2,147,483,647
    // 더 큰수를 사용해야한다면 mt_rand() 를 사용해야하고 , 실행속도도 더 빠르다.(4배)
?>