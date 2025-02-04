<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="header.css">
<style>
    html, body{
        height: 100%;
        background-color: #1f2029;
    }
     *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
    #register_text{
        text-decoration: underline;
    }
    main{
        background-color: #1f2029;
        height:100%;
    }
#container{
        display: block;
        margin-top: 5em;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
        height: 18em;
        border:2px solid gold;
        color: #f5f5f5;
        width: 15em;
        padding: auto;
        text-align: center;
        background-color: #2A2B38;

    }
#container .buttons_submit{
    margin-top: 1em;
    color: white;
    border-color: #2A2B38;
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
    a:link{
        color:white;
    }
    a:visited{
        color:pink;
    }
    a:hover{
        color:gold;
    }

</style>
<body>
<?php include("header.php");?> 
    <main>
    <?php
    if(isset($_SESSION["register"])){
        header("Location:index.php");
    }
    ?>
    <div id="container">
        <h2 id="register_text">REGISTER</h2>
    <form method="post">
        <p>Username</p>
        <input type="text" name="username"><br>
        <p>Password</p>
        <input type="password" name="pass"><br>
        <p>Email</p>
        <input type="email" name="email"><br>
        <input type="submit" name="register" class="buttons_submit">
        <input type="submit" name="checkuser" value="cheeeck" class="buttons_submit">
    </form>
    <a href="index.php?view=login">if you have already an account log in!</a>
</div>
</main>
    
</body>
<?php


?>
</html>