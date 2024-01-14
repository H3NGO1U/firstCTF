<?php
    include "db_conn.php";
    if(isset($_POST['uname']) && isset($_POST['password'])){
        $username=$_POST['uname'];
        $password=trim($_POST['password']);
        if($username==""){
            header("Location: login_page.php?error=User name is required");
            exit();
        }
        else if($password==""){
            header("Location: login_page.php?error=password is required");
            exit();
        }
        else{
            $sql = "SELECT * from users WHERE username='$username' AND password='$password'";

            $result = mysqli_query($conn, $sql);
            if(!$result)
                echo "FATAL ERROR";
            else{
                if(mysqli_num_rows($result)){
                $row = mysqli_fetch_assoc($result);
                header("Location: profile.php?id=".$row['id']);
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['username']=$row['username']; 
                exit();
                }    
                else{
                    header("Location: login_page.php?error=Username or password isn't correct");
                    exit();
                }
        }
            
        }
    }
    else if(!isset($_POST['uname'])){
        header("Location: login_page.php?error=User name is required");
        exit();
    }

    else if(!isset($_POST['password'])){
        header("Location: login_page.php?error=password is required");
        exit();
    }

?>