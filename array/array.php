<?php
// 배열 요소 추가 방법 1 ( 배열 생성 후 인덱스 이용하여 배열 요소 추가 )
    $arr = array();
    $arr[0] = '월';
    $arr[1] = '화';
    $arr[2] = '수';

    echo $arr[0].'<br>';  // 월
    echo $arr[1].'<br>';  // 화
    echo $arr[2].'<br>';  // 수


// 배열 요소 추가 방법 2 ( 배열 생성과 동시에 초기화 )
    $arr2 = array('목','금','토');
    echo $arr2[0].'<br>';  // 목
    echo $arr2[1].'<br>';  // 금
    echo $arr2[2];         // 토


// 해당 배열이 존재하지않다면 , 해당이름의 배열을 만든 후에 배열 요소 추가됨
    $arr3[0] = 'zzz';
    echo $arr3[0];


// 요소의 인덱스가 생략 되었을 경우, 인덱스가 순서대로 1씩 증가하여 저장됨
    $arr[] = '1';
    $arr[] = '2';
    $arr[] = '3';
    echo $arr[3].'<br>';  // 1
    echo $arr[4].'<br>';  // 2
    echo $arr[5].'<br>';  // 3


// 특정 인덱스에만 배열 요소 추가도 가능 ( array hole)
    $arr[7] = '안녕하세요';
    echo $arr[6].'<br>';    // x  ( hole)
    echo $arr[7];           // 안녕하세요


// hole 을 가지고 있는 배열에서는 for 문에서는 모든 배열 요소에 접근 할 수 없다.
    for ($i=0; $i < count($arr); $i++) {
        echo $arr[$i];      // 월 화 수 1 2 3 출력   
    }
    // 뒤에 $arr[7] = '안녕하세요' 는 출력이 안됨
    // 배열에 사용할수 있는 반복문 foreach 문을 사용하여 for문보다 간편하게 배열 요소에 접근 가능
    foreach($arr as $exam) {
        echo $exam;     // 월 화 수 1 2 3 안녕하세요 출력
    }
    

?>