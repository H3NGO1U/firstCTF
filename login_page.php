
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div id="header-comp"></div>
    <script src="header.js"></script>
    <br>
    <br>
    <form id="login_form" action="login.php" method="post">
        <h1>Please login</h1>
        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>User Name:</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password:</label>

        <input type="password" name="password" placeholder="Password"><br> 
        <br>
        <br>
        <button type="submit" id="login_button">Login</button>

     </form>
</body>
</html>