<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/header.php");
?>

<div id="board_area" width="1200">
 
 <h1>공지사항</h1>
 <table class="list-table">
 <thead>
     <tr>
         <th width="70">번호</th>
           <th width="800">제목</th>
           <th width="300">글쓴이</th>
           <th width="200">작성일</th>
       </tr>
   </thead>
   <?php
        $sql = "SELECT * FROM ta_board ORDER BY idx desc limit 0,10";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
        while($rs = $stmt -> fetch()) {
   ?>
 <tbody>
   <tr>
     <td width="70"><?= $rs['idx']; ?></td>
     <td width="500"><a href="read.php?board_id=notice&idx=<?= $rs["idx"];?>"><?= $rs['title'];?></a></td>
     <td width="120"><?= $rs['user_name']?></td>
     <td width="100"><?= $rs['regdate']?></td>
   </tr>
 </tbody>
 <?php 
 } 
 ?>
</table>
