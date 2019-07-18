<?php
session_start();
if(isset($_POST['submit'])){
    include 'dbh.inc.php';
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    //error handlers
    //empty
    if(empty($uid) || empty($pwd)){
        header("Location: index.php?login=pleasefill");
        exit();

    }
    else{
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            header("Location: index.php?login=error");
        exit();
        }
        else{
            if($row = mysqli_fetch_assoc($result)){
                //dehashing
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if($hashedPwdCheck == true){
                    header("Location: index.php?login=incorrectpassword");
                    exit();  
                }
                else if($hashedPwdCheck == false){
                    //log in here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    $_SESSION['u_budget'] = $row['budget'];
                    header("Location: page.php?login=successful");
                    exit();
                }
                
            }
        }

    }
}

    else{
        header("Location: index.php?login=error");
        exit();
    }

