<?php
session_start();
setcookie('premium', "no", time()+3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my account</title>
</head>
<body>
    <div id="header-comp"></div>
    <script src="header.js"></script>
    <?php if (isset($_SESSION['username'])&&isset($_GET['id'])) {?>
        <?php 
             include "db_conn.php";
             $id = $_GET['id'];
             $sql = "SELECT name from users WHERE id='$id'";
             $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "FATAL ERROR";
            }    
            else if(mysqli_num_rows($result)){
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['name'];
            $profile = "assets/profiles/$id.jpg";
            ?>
            <img id="profile_pic" src="<?php echo $profile?>" alt="fun">
            <h1 class="welcome"> <?php echo $name; ?></h1>
            
        <?php if($_GET['id']==1){?>
            <h3>Your status: <?php echo "firstCTF{6_sql_injection_quE3n!!}" ?></h3>
            <?php
        }    
    
        else if($_GET['id']==2){
            if(!isset($_COOKIE['premium'])||$_COOKIE['premium']!="yes"){
                echo "<h3>there's another flag, but it's only for our premium members:(((</h3>";
            }
            else if($_COOKIE['premium']=="yes"){ ?>
                    <h3><?php echo "firstCTF{8_cO0kies_str1ke!!}";?></h3>
                    <h3><?php echo "awesome! last flag is right here!!!";?></h4>
                    <h3><?php echo "can't you see it??";?></h4>
                    <br>                
                    <input value="firstCTF{9_u_did_a_GREAT_job!!}" hidden>  
                    <?php   
            }
        }
    }
}
    ?>
    <style>
        body{
            text-align:center;
        }
    #profile_pic{
        width:250px;
        height:auto;
    }
    </style>
</body>
</html>