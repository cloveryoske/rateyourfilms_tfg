<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<link rel="stylesheet" href="header.css">
<style>
    body{
        background-color: #1f2029;
    }
    #container{
        display: block;
        margin-top: 5em;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
        height: 17em;
        border:2px solid gold;
        color: #f5f5f5;
        width: 15em;
        padding: auto;
        text-align: center;
        background-color: #2A2B38;

    }
    #container #enviar{
        margin-top: 1em;
        color: #f5f5f5;
    }
    #container input{
        color:white;
        background-color: #1f2029;
        border-radius: 4px;
        border-color: #2A2B38;
    }
    #container input:focus{
        background-color: #2A2B38;
        color:white;
    }
    #container input:hover{
        background-color: rgb(49, 51, 66);
        border-color: rgb(49, 51, 66);

    }

</style>
<body>
<?php include_once("header.php");?> 
    <?php
    if(isset($_SESSION["register"])){
        header("Location: index.php");
    }
    ?>
    <div id="container">
    <h2>Log In!</h2>
    <form method="post">
        <div><p>Username</p>
        <input type="text" name="username" required></div>
        <div><p>Password</p>
        <input type="password" name="pass" required><br></div>
        <input type="submit" name="enviar" id="enviar" value="LOG IN">
    </form>
    </div>
</body>
</html>