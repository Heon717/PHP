<?php 
    include('pdo.php');
    
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $pw = $_POST['user_pw'];
    $pw_confirm = $_POST['pw_check'];
    echo $pw.$pw_confirm ;

    $hash = $password_hash($pw, PASSWORD_DEFAULT);
    echo $hash;

    try {
        $sql = "INSERT INTO member VALUES ()";
        echo "회원가입 성공 !";
    } catch (PDOEception $e) {
        echo "회원가입 실패";
    }
?>