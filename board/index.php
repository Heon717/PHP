<?php 
    include('list_select.php');
    $length = count($result);


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
</head>
<body>
    <div id="Wrap">
        <h1>게시판</h1>
        <p><a href="write.php">글 쓰기</a></p>
        <hr>
        <h2>글 목록</h2>
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
                    for($i = 0; $i < $length; $i++) {
                ?>
                    <tr onclick="location.href='detail.php?idx=<?=$i+1?>'">
                        <td width="70px"><?=$result[$i]['idx']?></td>
                        <td width="500px"><?=$result[$i]['title']?></td>
                        <td width="120px"><?=$result[$i]['name']?></td>
                        <td width="100px"><?=$result[$i]['regdate']?></td>
                        <td width="100px"><?=$result[$i]['hit']?></td>
                    </tr>
                    <div></div>
                <?php 
                    }
                }
                ?>

            </tbody>   
        </table>
        <hr>
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