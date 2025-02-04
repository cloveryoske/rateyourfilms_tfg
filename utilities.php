<?php
function getAverageRateResult($results){
    $arrayAverageFilms = [];
    foreach($results as $info){
        $suma_rating = 0;
        if($info["ratings_count"] <= 0){
            $values = 0;
        }
        else{
            foreach($info["arrayRatings"] as $film){
                $suma_rating = $suma_rating + intval($film["rating"]);
            }
            $average = $suma_rating / $info["ratings_count"];
            $values = $average;
        }
        array_push($arrayAverageFilms, $values);
        
        
    }
    return $arrayAverageFilms;
}

?>