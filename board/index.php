<?php 
    include('header.php');
    include('boardselect.php');
    include("pdo.php");
    
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $length = count($result);

    // //페이지 설정
    $page_set = 8; //  한페이지 줄 수
    $block_set = 5; //  한페이지 블럭 수
    $page_idx = $page_set*$page;

    $list_sql = "SELECT COUNT(*) AS total FROM board";
    $list_stmt = $conn->prepare($list_sql);
    $list_stmt->execute();
    
    $list_result = $list_stmt->fetch(PDO::FETCH_ASSOC);
    
    $total = $list_result['total'];  // 게시글 총 갯수
    
    $total_page = ceil ($total / $page_set);        //  총게시글 / 보여야할 게시글 (10개) 
    $total_block = ceil ($total_page/$block_set);   //  총 블럭수
    
    $block = ceil ($page / $block_set); // 현재블럭
    $limit_idx = ($page -1) * $page_set; // limit 시작 위치
    
    // echo '<br> 총게시글수 : '.$total;
    // echo '<br> 페이지 수 :'.$total_page;
    // echo '<br> 총 블럭 수 :'.$total_block;
    // echo '<br> 현재블럭 :'.$block;
    // echo '<br> limit 시작 위치 : '.$limit_idx;
    
    // 현재페이지 쿼리
    $limit_sql = "SELECT * FROM board ORDER BY idx DESC LIMIT :limit_idx,:page_set";
    
    $limit_stmt = $conn->prepare($limit_sql);
    $limit_stmt->bindParam(':limit_idx',$limit_idx,PDO::PARAM_INT);
    $limit_stmt->bindParam(':page_set',$page_set,PDO::PARAM_INT);
    $limit_stmt->execute();
    $limit_result = $limit_stmt->fetchAll(PDO::FETCH_ASSOC);

    // 페이지 번호 $ 블럭 설정
    $first_page = max($page - $block_set,1);            // 첫번째 페이지 번호
    // $first_page = (($block*1)*$block_set)+1;            // 첫번째 페이지 번호
    $last_page = min ($total_page,$block*$block_set);   // 마지막 페이지 번호
    
    $prev_page = $page - 1;  // 이전 페이지
    $next_page = $page + 1;  // 다음 페이지

    $prev_block = $block - 1;  // 이전 블럭
    $next_block = $block + 1;  // 다음 블럭
    
    $prev_block_page = $prev_block * $block_set;
    $next_block_page = $next_block * $block_set - ($block_set - 1);

    // echo ($prev_page > 0) ? "<a href='".$_SERVER['PHP_SELF']."?page=$prev_page'>[prev]</a> " : "[prev] ";
    // echo ($prev_block > 0) ? "<a href='".$_SERVER['PHP_SELF']."?page=$prev_block_page'></a> " : "... ";
    // // echo '<br>'.$first_page;
    // // echo '<br>'.$last_page;
    // for ($i=$first_page; $i<=$last_page; $i++) {
    //     echo ($i != $page) ? "<a href='$PHP_SELF?page=$i'>$i</a> " : "<b>$i</b> ";
    //     }
    // echo ($next_block <= $total_block) ? "<a href='".$_SERVER['PHP_SELF']."?page=$next_block_page'>...</a> " : "... ";
    // echo ($next_page <= $total_page) ? "<a href='".$_SERVER['PHP_SELF']."?page=$next_page'>[next]</a>" : "[next]";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <style> p,h1,h2 { text-align: center;}
            table{margin:auto;}
            table>tbody>tr { height: 20px;}
            a { margin:auto;}
    </style>
</head>
<body>
    <div id="Wrap">
        <h1>게시판</h1>
        <hr>
        <h2>글 목록</h2>
        <p><a href="write.php">글 쓰기</a></p>
        <table>
            <thead>
                <tr>
                    <hr>
                    <th width="70px">번호</th>
                    <th width="500px">제목</th>
                    <th width="120px">글쓴이</th>
                    <th width="100px">작성일</th>
                    <th width="100px">조회수</th>
                </tr>
            </thead>

            <tbody style="cursor:pointer;"> 
                <?php 
                if ($length <= 0) {
                ?>
                    <td>
                        게시글이 없습니다
                    </td>
                    <?php
                }  else { 
                    for($i = $limit_idx; $i < $page_idx; $i++) {
                        // 만약에 $i 가 $length 를 넘어간다면 for문 스톱
                        if($i == $length) {
                            break;
                        }
                            ?>
                    <tr onclick="location.href='detail.php?idx=<?=$result[$i]['idx']?>'">
                        <td width="70px"><p><?=$result[$i]['idx']?></p></td>
                        <td width="500px"><p><?=$result[$i]['title']?></p></td>
                        <td width="120px"><p><?=$result[$i]['name']?></p></td>
                        <td width="100px"><p><?=$result[$i]['regdate']?></p></td>
                        <td width="100px"><p><?=$result[$i]['hit']?></p></td>
                    </tr>
                    <div></div>
                    <?php 
                    }
                }
                ?>
            </tbody>   
        </table>
        <hr>
        <?php 
            echo ($prev_page > 0) ? "<a href='"."?page=$prev_page'>[prev]</a> " : "[prev] ";
            echo ($prev_block > 0) ? "<a href='".$_SERVER['PHP_SELF']."?page=$prev_block_page'></a> " : "... ";

            for ($i=$first_page; $i<=$last_page; $i++) {
                echo ($i != $page) ? "<a href='".$_SERVER['PHP_SELF']."?page=$i'>$i</a> " : "<b>$i</b> ";
                }
            echo ($next_block <= $total_block) ? "<a href='".$_SERVER['PHP_SELF']."?page=$next_block_page'>...</a> " : "... ";
            echo ($next_page <= $total_page) ? "<a href='".$_SERVER['PHP_SELF']."?page=$next_page'>[next]</a>" : "[next]";
        ?>
        
        <!-- <h2>글 검색</h2>
        <form action="search.php" method="post">
            <h3>검색할 키워드를 입력하세요.</h3>
            <p>
                <label for="search">키워드:</label>
                <input type="text" id="search" name="skey">
            </p>
            <input type="submit" value="검색">
        </form>
        <hr>
        <h2>글 삭제</h2>
        <form action="delete.php" method="post">
            <h3>삭제할 메시지 번호를 입력하세요.</h3>
            <p>
                <label for="msgdel">번호 :</label>
                <input type="text" id="msgdel" name="delnum">
            </p>
            <input type="submit" value="삭제">
        </form> -->
    </div>
</body>
</html>