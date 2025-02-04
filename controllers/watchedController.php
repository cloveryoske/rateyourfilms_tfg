<?php

class WatchedController{
    private $model;
    public function __construct(){
        $this->model = new Model();

    }
    public function ShowWatched($id){
        $client = $this->model->getClient();
        $results = $this->model->getWatchedByUser($client, $id);
        $results = iterator_to_array($results);
        $extractedFilms = [];
        foreach($results as $result){
            $result = $this->model->getFilm($client, $result["film_id"]);
            array_push($extractedFilms, $result);
        }
        $films = $this->addRatingToFilms($extractedFilms);
        include("views/watchedView.php");

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