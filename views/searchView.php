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
        html,body{
            background-color: #1f2029;
            color: #f5f5f5;
            height: 200%;
            width:100%;
            overflow-x: hidden;
        }
        main{
            margin-top: 0.5em;
            background-color: #1f2029;
            color: #F6F5F7;
            display:grid;
            grid-template-columns: repeat(3,1fr);
            gap: 10px;
        }
        .film{
            position: relative;
            border: 1px solid red;
            display: inline-block;
            justify-items: center;
            margin:auto;
            align-items: center;
            justify-content: center;
            text-align: center;

        }
        .overlaycontainer{
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position:absolute;
            display: none;
            
        }
        .film:hover .overlaycontainer{
            display:block;
        }
        .film:hover .overlaycontainer:hover{
            cursor:pointer;
        }
        img{
            max-width:100%;
            height:auto;
            display: block;
        }
        .film:hover img{
            cursor:pointer;
            opacity:0.4;
        }
        .type_title:hover{
            cursor:pointer;
        }
    </style>
</head>
<body>
<?php include_once("header.php");?> 

<?php
?>
<main>
<?php
if($films == null){
    echo "no hay resultados";
}
else{
foreach($films as $film){
    echo"<div class='film' id='". $film["_id"]. "' border='2px solid black'>";
                echo "<img src='" . $film["poster_url"] . "' style='height:225px; width:150px;'>";
                echo "<div class='overlaycontainer'>";
                    echo "<p>" . $film["title"] . "</p>";
                    echo "<p>(" . $film["year"] . ")</p>";
                    echo "<p id='avg'>avg: ". $film['0'][0]. "</p>";
                echo "</div>";
    echo "</div>";
}
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