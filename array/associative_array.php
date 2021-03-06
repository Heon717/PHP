<?php
/*   연관배열 (associative array)
    인덱스로 정수뿐만아닌 다양한 타입으로 설정한 배열 
*/

// 배열 요소 추가 방법 1  ( 배열 생성 후 요소 추가 )
$arr = array();
$arr["사과"] = 1000;
$arr["포도"] = 2000;
$arr["수박"] = 3000;


// 배열 요소 추가 방법 2 ( 배열 생성과 동시에 초기화 )
$arr = array
(
    "사과" => 1000,
    "포도" => 2000,
    "수박" => 3000
);
print_r($arr);

// 연괄 배열의 인덱스는 숫자가 아니므로, for문을 사용하여 배열 요소 접근 불가 
// foreach 문을 사용하여 접근
foreach($arr as $key => $value) {
    echo "<br>".$key." : ".$value."<br>"; // 사과 : 1000
                                          // 포도 : 2000
                                          // 수박 : 3000 출력
}
?>