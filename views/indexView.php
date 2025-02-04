<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        html{
            background-color: #1f2029;
            color: #f5f5f5;
            height:200%;
            width:100%;
        }
        .film{
            position:relative;
            display: inline-block;
            margin:auto;
            align-items: center;
            justify-content: center;
            text-align: center;

        }
        img{
            width:100%;
            height:auto;
        }
        .film:hover img{
            cursor:pointer;
            opacity:0.4;
        }
        .film:hover .overlaycontainer{
            display:block;
        }
        .overlaycontainer{
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position:absolute;
            display: none;
            
        }
        .overlaycontainer:hover{
            cursor:pointer;
            
        }
        .type_container{
            display:block;
            margin-left: 0;
            margin-right: 0;
            text-align: center;
            margin-bottom: 2em;
        }
        .type_title:hover{
            cursor:pointer;
        }
        .films_container{
            width: 100%;
            position:relative;
            display: inline-block;
            align-items: center;
            justify-content: center;
            text-align: center;

        }
        #avg{
            bottom:0;
        }
    </style>
</head>
<body>
    <?php include_once("header.php");?> 
    <main>
<?php

            echo "<div class='films_container'>";
                echo "<div class='type_container'>";
                echo "<h2 class='type_title' name='random'>". "Películas Aleatorias". "</h2>";
                echo "</div>";
            foreach($films as $film){
                
                echo"<div class='film' id='". $film["_id"]. "' border='2px solid black'>";
                echo "<img src='" . $film["poster_url"] . "' style='height:225px; width:150px;'>";
                echo "<div class='overlaycontainer'>";
                echo "<p>" . $film["title"] . "</p>";
                echo "<p>(" . $film["year"] . ")</p>";
                echo "<p id='avg'>avg :". $film['0'][0]. "</p>";
        
                
                echo "</div>";
                echo "</div>";
        
            }

            echo "</div>";
            $contadorGenero = 0;
            foreach($arrayFilmsGenres as $filmArray){
                
                echo "<div class='films_container'>";
                echo "<div class='type_container'>";
                echo "<h2 class='type_title' name='".$orderGenres[$contadorGenero]."'>". $orderGenres[$contadorGenero]. "</h2>";
                echo "</div>";
                foreach($filmArray as $film){
                    
                    echo"<div class='film' id='". $film["_id"]. "' border='2px solid black'>";
                    echo "<img src='" . $film["poster_url"] . "' style='height:225px; width:150px;'>";
                    echo "<div class='overlaycontainer'>";
                    echo "<p>" . $film["title"] . "</p>";
                    echo "<p>(" . $film["year"] . ")</p>";
                    echo "<p id='avg'>avg :". $film["0"][0]. "</p>";
            
                    
                    echo "</div>";
                    echo "</div>";
            
                }
                echo "</div>";
                $contadorGenero++;


        
            }
?>
</main>
</body>
<script>
    var film = document.getElementsByClassName("film")
    Array.from(film).forEach(element => {
        element.addEventListener("click", function(){
            window.location.href = "index.php?id=" + element.id + "&view=film"
        })
    });
</script>
</html>