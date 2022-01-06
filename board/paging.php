<?php
    include("pdo.php");

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    // //페이지 설정
    $page_set = 10; //  한페이지 줄 수
    $block_set = 5; //  한페이지 블럭 수

    $list_sql = "SELECT COUNT(*) AS total FROM board";
    $list_stmt = $conn->prepare($list_sql);
    $list_stmt->execute();

    $list_result = $list_stmt->fetch(PDO::FETCH_ASSOC);

    $total = $list_result['total'];  // 게시글 총 갯수

    $total_page = ceil ($total / $page_set);        //  총게시글/ 보여야할 게시글 (10개) 
    $total_block = ceil ($total_page/$block_set);   //  총 블럭수

    $block = ceil ($page / $block_set); // 현재블럭
    $limit_idx = ($page -1) * $page_set; // limit 시작 위치

    // 현재페이지 쿼리
    $limit_sql = "SELECT * FROM board ORDER BY idx DESC LIMIT $limit_idx, $page_set";
    $limit_stmt = $conn->prepare($limit_sql);
    $limit_stmt->execute();

    $limit_result = $limit_stmt->fetch(PDO::FETCH_ASSOC);
    echo "<pre>";
    while($list_result = $list_stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $list_result['idx']."\n";
    }
    echo "</pre>";
    
?>

<?php
    // include("pdo.php");

    // if(isset($_GET['page'])) {
    //     $page = $_GET['page'];
    // } else {
    //     $page = 1;
    // }

    // $list_sql = "SELECT COUNT(*) AS total FROM board";
    // $list_stmt = $conn->prepare($list_sql);
    // $list_stmt->execute();
    // $list_result = $list_stmt->fetch(PDO::FETCH_ASSOC);

    // $total = $list_result['total']; // 전체 게시글 수
    
    // $one_page = 10;                 // 한페이지에 보일 게시글 수
    // $all_page = ceil($total/$one_page); // 전체 페이지 수

    // if($page < 1 || ($all_page && $page >$all_page)) {
?>
    <!-- <script>
        alert("존재하지 않는 페이지입니다.");
        history.back();
    </script> -->
<?php
    // exit;
    // }
    // $oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)

	// $currentSection = ceil($page / $oneSection); //현재 섹션

	// $allSection = ceil($all_page / $oneSection); //전체 섹션의 수
    // echo $all_page;
	

	// $firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지

	

	// if($currentSection == $allSection) {

	// 	$lastPage = $all_page; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.

	// } else {

	// 	$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지

	// }

	

	// $prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.

	// $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.

	

	// $paging = '<ul>'; // 페이징을 저장할 변수

	

	// //첫 페이지가 아니라면 처음 버튼을 생성

	// if($page != 1) { 

	// 	$paging .= '<li class="page page_start"><a href="./index.php?page=1">처음</a></li>';

	// }

	// //첫 섹션이 아니라면 이전 버튼을 생성

	// if($currentSection != 1) { 

	// 	$paging .= '<li class="page page_prev"><a href="./index.php?page=' . $prevPage . '">이전</a></li>';

	// }

	

	// for($i = $firstPage; $i <= $lastPage; $i++) {

	// 	if($i == $page) {

	// 		$paging .= '<li class="page current">' . $i . '</li>';

	// 	} else {

	// 		$paging .= '<li class="page"><a href="./index.php?page=' . $i . '">' . $i . '</a></li>';

	// 	}

	// }

	

	// //마지막 섹션이 아니라면 다음 버튼을 생성

	// if($currentSection != $allSection) { 

	// 	$paging .= '<li class="page page_next"><a href="./index.php?page=' . $nextPage . '">다음</a></li>';

	// }

	

	// //마지막 페이지가 아니라면 끝 버튼을 생성

	// if($page != $all_page) { 

	// 	$paging .= '<li class="page page_end"><a href="./index.php?page=' . $all_page . '">끝</a></li>';

	// }

	// $paging .= '</ul>';

	

	// /* 페이징 끝 */

	// $currentLimit = ($one_page * $page) - $    $one_page = 10;                 // 한페이지에 보일 게시글 수
    // ; //몇 번째의 글부터 가져오는지

	// $sqlLimit = ' limit ' . $currentLimit . ', ' . $    $one_page = 10;                 // 한페이지에 보일 게시글 수
    // ; //limit sql 구문

	

	// $limit_sql = 'SELECT  * FROM board ORDER BY idx DESC' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
    // $limit_stmt = $conn->prepare($limit_sql);
    // $limit_stmt->execute();
    // $limit_result = $limit_stmt->fetch(PDO::FETCH_ASSOC);

?>