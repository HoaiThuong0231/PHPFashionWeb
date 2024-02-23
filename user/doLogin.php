<?php 
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sql= "SELECT * FROM user WHERE email= '". $email."' AND password = '". sha1($pass) . "'";
    $result=$f->getOne($sql);

    if(!empty($result)){
        $_SESSION['user'] = $result['username'];
        $_SESSION['userId'] = $result['id'];

        if(isset($_POST['remember'])){
            setcookie("username", $email, time() + (3600 * 24 * 30), "/"); 
            setcookie("password", $pass, time() + (3600 * 24 * 30), "/");
        }
        else {
            setcookie("username", "", time() - 3600, "/"); 
            setcookie("username", "", time() - 3600, "/");
        }
        exit(header("Location: index.php?page=login"));
    } else{
        echo "Email hoặc Password không đúng!";
    }
?>
