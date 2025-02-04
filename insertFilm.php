<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h3{
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        body{
            background-color: pink;
        }
        #formCountry{
            width:500px;
            background-color: lightblue;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        #formCountry> form>input{
            margin-bottom: 20px;
            
        }
        #formCountry> form>select{
            margin-bottom: 20px;
            
        }
        .films{
            display:grid;
            grid-template-columns: repeat(6, 1fr);
        }
        
    </style>
</head>
<body>
    <?php
    $filmGenres = array(
        "Action",
        "Adventure",
        "Animation",
        "Comedy",
        "Drama",
        "Fantasy",
        "Horror",
        "Mystery",
        "Romance",
        "Sci-Fi",
        "Thriller",
        "Documentary",
        "Musical",
        "Western",
        "Crime",
        "History",
        "Biography",
        "Sport",
        "War",
        "Family",
        "Experimental"
    );
    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    ?>
    <?php
    require_once("db.php");
    require_once("utilities.php");
    require_once("viewFunctions.php")

    ?>
    <h3>INSERTE AQUI LOS DATOS DE SU PELICULA</h3>
    <hr>
    <div id="formCountry">
    <form method="post">
        TITLE:<input type="text" name="title" required><br>
        YEAR:<input type="number" name="year" required min="1900" max="2030"><br>
        GENRE 1: <select name="genre1"><
            <?php
                foreach($filmGenres as $genre){
                    echo "<option value='$genre'>$genre</option>";
                }
            ?>


        </select><br>
        GENRE 2:<select name="genre2">
            <?php
                foreach($filmGenres as $genre){
                    echo "<option value='$genre'>$genre</option>";
                }
            ?>


        </select><br>
        DURATION (MIN):<input type="number" name="duration" required><br>
        LANGUAGE<input type="text" name="language" required>
        COUNTRY: <select name="country">
                <?php
                foreach($countries as $country){
                    echo "<option value='$country'>$country</option>";
                }
                ?>

        </select><br>
        DESCRIPTION: <input type="text" name="description" required><br>
        POSTER_URL : <input type="text" name="poster_url" required><br>
        NOMBRE DEL DIRECTOR: <input type="text" name="director" required><br>
        CAST:
        <div name="divcast">
        <input type="text" name="cast1" required>
        <input type="text" name="cast2" required>
        <input type="text" name="cast3">
        <input type="text" name="cast4">
        <input type="text" name="cast5">
        <input type="text" name="cast6">
        </div>
        <br>
        <input type="submit" name="insertFilm">
        <input type="reset">
        <hr>
        <p>borrar nene</p>
        <form method="post">
            <input type="text" name="id">
            <input type="submit" name="deletefilm">
        </form>
    </form>
    <hr>
        <p>cambia el poster</p>
        <form method="post">
            <input type="text" name="id">
            <input type="text" name="poster">
            <input type="submit" name="changePoster">
        </form>
    </div>


    <?php
    echo "<div class='films'>";
    $films = getAllFilms($client);
    foreach($films as $film){
        $results = ratingsOneFilm($client, $film["_id"]);
        $average = getAverageRateResult($results);
        echo "<div class='film'>";
        echo "<img src='" . $film["poster_url"] . "' style='height:225px; width:150px;'>";
        echo "<p>ID: ".$film["_id"]."</p>";
        echo "<p> TITULO " . $film["title"] . "</p>";
        echo "<p>AVERAGE RATING ". $average[0]["average"]. "</p>";
        echo "</div>";
    }
    echo "</div>";
    echo "<hr>";
    $results = ratingAllFilmsPipeline($client);
    $averageFilms = getAverageRateResult($results);
    foreach($averageFilms as $films){
        echo $films["title"];
        echo $films["average"];

    }




    ?>





</body>
<?php

if(isset($_POST["deletefilm"])){
    echo "hola!";
    $id= $_POST["id"] ?? "";
    $result = deleteFilm($client,$id);
    var_dump($result);

}
if(isset($_POST["insertFilm"])){
    $arraycast = [];
    $title = $_POST["title"] ?? "";
    $year = $_POST["year"] ?? 0;
    $genre = $_POST["genre1"] ?? "";
    $genre2 = $_POST["genre2"] ?? "";

    $arraygenres = [$genre, $genre2];

    $duration = $_POST["duration"] ?? 0;
    $language = $_POST["language"] ?? "";
    $country = $_POST["country"] ?? "";
    $description = $_POST["description"] ?? "";
    $poster_url = $_POST["poster_url"] ?? "";
    $director = $_POST["director"] ?? "";
    for($i = 0; $i < 10; $i++){
        if(!isset($_POST["cast$i"])){
            continue;
        }
        array_push($arraycast, $_POST["cast$i"]);
    }
    $doc = [
        'title' => $title,
        'year' => $year,
        'genres' => $arraygenres,
        'duration' => $duration,
        'language' => $language,
        'country' => $country,
        'description' => $description,
        'poster_url' =>$poster_url,
        'director' => $director,
        'cast' => $arraycast
    ];
    if(checkFilm($client,$title)){
        echo"YA EXISTE ESA PELICULA";
    }
    else{
        insertFilm($client, $doc);
        echo "pelicula insertada";
    }

}
if(isset($_POST["changePoster"])){
    $id = $_POST["id"] ?? "";
    $poster_url = $_POST["poster"] ?? "";
    $result = changePoster($client, $id, $poster_url);
    echo $result;

}

?>
</html>