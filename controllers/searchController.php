<?php
require_once("models/db.php");
class SearchController{
    private $model;
    public function __construct(){
        $this->model = new Model();

    }
    public function showSearch($text){
        $client = $this->model->getClient();
        $result = $this->model->searchFilm($client, $text);
        $films = $this->addRatingToFilms($result);
        include("views/searchView.php");

        
    }
    public function addRatingToFilms($films){
        $client = $this->model->getClient();
        $newFilmArray = [];
        foreach($films as $film){
            $film = iterator_to_array($film);
            $filmRating = $this->model->ratingsOneFilm($client, $film["_id"]);
            $averageRate = getAverageRateResult($filmRating);
            array_push($film, $averageRate);
            array_push($newFilmArray, $film);

        } 
        return $newFilmArray;
    }



}
?>