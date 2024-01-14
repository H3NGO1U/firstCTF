<?php
    $url = "Location: admin.php";
    $changed = false;
    if(!isset($_GET['admin'])){
         $url.="?admin=no";
         $changed=true;
    }
    if($changed && isset($_GET['secret_code'])){
        $secret_code = $_GET['secret_code'];
        $url.="&secret_code=".$secret_code;
    }
    else if(!isset($_GET['secret_code']) && isset($_POST['secret_code'])){
        $secret_code = $_POST['secret_code'];
        $url.="&secret_code=".$secret_code;
        $changed=true;
    }
    if($changed){
        header($url);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For authorized eyes only</title>
</head>
<a href="../home.html">Back to home</a>
<body>
    <h1>Enter admin's code:</h1>
    <form action="admin.php" method="POST">
        <input id="code_input" name="secret_code" type="number" min=0 max=100>
        <button id="submit_btn" type="submit">submit</button>
    </form>
    <br>
        <?php               
$secret_code = 453;
if(isset($_GET['secret_code'])){
    if($_GET['secret_code']==$secret_code){
        echo "<br><h3>firstCTF{3_qu3rY_p4r4meters_mast3r!!}</h3>";
    }
    else{
        echo "<h3>Secret code is incorrect:(</h3>";
    }
    echo "<br><br>";
}   
echo "<br><br><br><br>";       
echo "<button id='sec_button' onclick='show_code()'>Show secret code</button>";       
if($_GET['admin']!="yes")
    echo "<h2 id='sec_code' style='display:none;'>Sorry, youre not admin:(((((</h2>";

else if($_GET['admin']=="yes"){
    echo "<h2 id='sec_code' style='display:none;'>$secret_code</h2>";
}

?>
<br>
<br>
<img src="images/key.jpg" alt="">
</body>
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
body{
    text-align:center;
}

#code_input{
    height:20px;
}
#submit_btn{
    height:30px;
    background-color:#e0c275;
}

#sec_button{
    width:200px;
    font:20px arial;
    background-color:#e0c275;
}
</style>
<script>
    function show_code(){
        document.getElementById("sec_code").style.display="block";
    }
</script>
</html>