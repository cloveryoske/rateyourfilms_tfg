<?php
    class IndexController{
        private $model;

        public function __construct(){
            $this->model = new Model();
        }
        public function showFilms(){
            $genres = getGenres();
            $client = $this->model->getClient();
            $films = $this->model->getRandomDocuments($client);
            $films = $this->addRatingToFilms($films);
            $arrayFilmsGenres = [];
            $orderGenres = [];
            foreach($genres as $genre){
                array_push($orderGenres, $genre);

                $filmsGenre = $this->model->getFilmsByGenreLimited($client,$genre);
                $newarrayFilmsGenres = $this->addRatingToFilms($filmsGenre);
                array_push($arrayFilmsGenres, $newarrayFilmsGenres);  
            }
            include("views/indexView.php");
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