<?php 
    include('pdo.php');

    $id = $_POST('id');
    $name = $_POST('name');
    $pw = $_POST('pw');
    $pw_confirm = $_POST('pw_confirm');

    try {
        $sql = "INSERT INTO member"
        echo "회원가입 성공 !";
    } catch (PDOEception $e) {
        echo "회원가입 실패";
    }
?>