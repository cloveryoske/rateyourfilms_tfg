<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>
    <link rel="stylesheet" href="header.css">
    <style>
        html,
        body {
            background-color: #121212;
            color: #f5f5f5;
            height: 200%;
            width: 100%;
            overflow-x: hidden;
        }

        .film {
            width: 70%;
            text-align: center;
            height: 100%;
            float: left;
            font-size: 1.5em;

        }

        #film_title {
            font-size: 2.5em;
            padding-bottom: 0.2em;
        }

        #description {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            background-color: rgb(58, 60, 77);
            margin-top: 1.5em;
            margin-bottom: 1.5em;
        }

        #info_container {
            vertical-align: middle;
            background-color: rgb(58, 60, 77);
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        #info_container tr td {
            vertical-align: middle;
            margin-right: auto;
            text-align: left;
        }

        #info_container th {
            vertical-align: middle;
        }

        #credits {
            background-color: rgb(58, 60, 77);
            margin-top: 2em;
            width: 70%;
            margin-left: auto;
            margin-right: auto;

        }

        #credits ul {
            vertical-align: middle;
            list-style: none;
        }

        #credits ul li {
            padding-bottom: 0.5em;
            padding-left: 0.5em;
            text-align: left;
        }

        #rating_container {
            margin-left: 0.5em;
            width: 100%;
            height: 3em;
            margin-bottom: 15em;
        }
        #rating_container p{
            font-size: 1.5em;
            text-align: center;
        }

        #filmUserInfo {
            background-color: #252525;
            vertical-align: middle;
            width: 30%;
            float: left;
            height: 100%;

        }

        #filmUserInfo img {
            width: 100%;
            height: auto;
            display: block;
            margin-top: 0.5em;
            margin-left: auto;
            margin-right: auto;

        }

        #rating_text {
            margin-left: 0.5em;
            margin-top: 1em;
            font-size: 1.5em;
            text-align: center;
        }

        #userReview {
            background-color: rgb(58, 60, 77);
            margin-top: 1em;
            font-size: 1em;
            width: 70%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }

        #watched_container {
            display: flex;
            font-size: 1.5em;
            margin-top: 1em;
            justify-content: start;
            gap: 1em;
            align-items: center;
            margin-left: 0.5em;
            width: 100%;

        }

        #watchlist_container {
            display: flex;
            font-size: 1.5em;
            margin-top: 1em;
            justify-content: start;
            gap: 1em;
            align-items: center;
            margin-left: 0.5em;
            width: 100%;
        }

        main {
            width: 100%;
            height: 100%;
        }

        #header_review {
            width: 100%;
            background-color: black;
            color: white;
        }
    
    #notas{
    background-color: #afa1a1;
    }
    #text{
        text-align: center;
        font-size: 3em;
    }
    #notas ul{
        display:flex;
        justify-content: center;
    }
#notas li{
    text-align: left;
    display:inline-block;
    padding-left: auto;
    padding-right: auto;
    padding:5px;
    font-size: 3em;

}
#notas li:hover{
    cursor:pointer;

}
#reset{
    border-radius: 3px;
}
.boton{
    font-size: 2em;
    margin-top: 10px;
    margin-bottom: auto;
    display:block;
    text-align: center;
    justify-content: center;
    margin-right: auto;
    margin-left: auto;
    border-radius: 3px;
    box-shadow: 1px,1px,1px,5px black;
}

    </style>
</head>

<body>
    <?php include("header.php"); ?>
    <?php
    //if(!isset($_GET["id"])){
    //header("Location: index.php");
    //}
    /*$client = getConnection();*/
    if ($film == null) {
        echo "pelicula no encontrada";
    } else {
        //DATOS DE LA PELÍCULA.
        echo "<div class='film' id='" . $film["_id"] . "' border='2px solid black'>";
        echo "<p id='film_title'>" . $film["title"] . "</p>";
        echo "<hr>";
        echo "<p id='description'> " . $film["description"] . "</p>";
        echo "<table id='info_container'>";
        echo "<tr>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>AÑO</th>";
        echo "<td> " . $film["year"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>GÉNEROS</th>";
        echo "<td>";
        foreach ($film["genres"] as $genre) {
            echo $genre . " ";
        }
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>DURACIÓN</th>";
        echo "<td> " . $film["duration"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>PAÍS</th>";
        echo "<td> " . $film["country"] . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "<div id='credits'>";
        echo "<ul>";
        echo "<p>Créditos</p>";
        foreach ($film["cast"] as $cast) {
            echo "<li>" . $cast . "</li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "<div id='userReview'>";
        if (!isset($_SESSION["register"])) {
            echo "<a href='index.php?view=register'>login to review!</a>";
        } else {
            //REVIEW DEL USUARIO
            if ($valueReview[0]) {
                echo "<div id='header_review'>";
                echo $user["username"] . " ";
                echo $valueReview[1]["reviewed_on"];
                echo "</div>";
                echo "<span>";
                echo $valueReview[1]["review"];
                echo "</span>";
            } else {
                echo "<p>REVIEW THIS FILM!</p>";
                echo "<form method='post'>";
                echo "<textarea name='review_text'></textarea>";
                echo "<input type='submit' name='upload_review'>";
                echo "</form>";
            }
        }

        echo "</div>";
        echo "</div>";
        //ASIDE DE LA PÁGINA
        echo "<div id='filmUserInfo'>";
        echo "<img src='" . $film["poster_url"] . "' style='height:460px; width:460px;'>";
        if (isset($_SESSION["register"])) {
            if ($valueRated[0]) {
                echo "<p id='rating_text'>Le has puesto un " . $valueRated[1]["rating"] . " cabron</p>";
            } else {
            echo "<div id='rating_container'>";
                echo "<p>Rate your Film!</p>";
                    echo "<div id='notas'>";
                        echo "<h3 id='text'>?</h3>";
                        echo"<ul>";
                        echo "<ul>";
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<li id='$i' onmouseover='rating($i)' onclick='sendrate($i)'>☆</li>";
                        }
                        echo "</ul>";
                        echo"</ul>";
                        echo"<button class='boton'onclick='reset()'>↺</button>";
                    echo"</div>";
            echo "</div>";


            }
            if ($valueWatched[0]) {
                echo "<div id='watched_container'>";
                echo "<p>" . "Click to Unwatch!" . "</p>";
                echo "<form method='post'>";
                echo "<button type='submit' name='unwatch'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 7.449-11.985 7.449c-7.18 0-12.015-7.449-12.015-7.449s4.446-6.551 12.015-6.551c7.694 0 11.985 6.551 11.985 6.551zm-7 .449c0-2.761-2.238-5-5-5-2.761 0-5 2.239-5 5 0 2.762 2.239 5 5 5 2.762 0 5-2.238 5-5z'/></svg>
                    </button>";
                echo "</form>";
                echo "</div>";
            } else {
                echo "<div id='watched_container'>";
                echo "<p>" . "Click to Watch!" . "</p>";
                echo "<form method='post'>";
                echo "<button type='submit' name='watched'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 5c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm0-2c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z'/></svg>
                        </button>";
                echo "</form>";
                echo "</div>";
            }
            if($valuesWatchlist[0]) {
                echo "<div id='watchlist_container'>";
                echo "<p>" . "Click to remove from Watchlist!" . "</p>";
                echo "<form method='post'>";
                echo "<button type='submit' name='removeWatchlist'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 7.449-11.985 7.449c-7.18 0-12.015-7.449-12.015-7.449s4.446-6.551 12.015-6.551c7.694 0 11.985 6.551 11.985 6.551zm-7 .449c0-2.761-2.238-5-5-5-2.761 0-5 2.239-5 5 0 2.762 2.239 5 5 5 2.762 0 5-2.238 5-5z'/></svg>
                    </button>";
                echo "</form>";
                echo "</div>";
            } else {
                echo "<div id='watchlist_container'>";
                echo "<p>" . "Click to add to Watchlist!" . "</p>";
                echo "<form method='post'>";
                echo "<button type='submit' name='addWatchlist'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 5c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm0-2c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z'/></svg>
                        </button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<a href='index.php?view=register'>login to rate!</a>";
        }
        echo "</div>";

    }
    echo print_r($_REQUEST);
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
const totalrating = 10
function rating(n){
    let i = 1;
    while(i <= totalrating){
        if(i <= n){
            document.getElementById(i.toString()).innerText = "★"
        }
        else{
            document.getElementById(i.toString()).innerText = "☆"
        }
        i++
    }
    document.getElementById("text").textContent = n
}
function reset(){
    let i = 1;
    while(i <= totalrating){
        document.getElementById("text").textContent = "?"
         document.getElementById(i.toString()).innerText = "☆"
         i++;
    }
}
function sendrate(n){
    $.ajax({
        url:"index.php?id=<?php echo $_GET["id"] ?? ''?>"+ "&view=film",
        type:"POST",
        data: JSON.stringify({ rating: n }),
        success: function(event){
            window.location.reload();
            console.log("todo funciona correctamente")
        },
        error: function(event){
            console.log("error en la consulta")
        }
    })

}
</script>
</html>