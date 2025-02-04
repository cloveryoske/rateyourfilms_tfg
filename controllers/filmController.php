<?php
require_once("models/db.php");

class FilmController{

    private $model;

    public function __construct(){
        $this->model = new Model();
    }
    public function requests($id){
        $client = $this->model->getClient();
        header('Content-Type: application/json');
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        if(!isset($id)){
            header("Location: index.php");
        }
        
        if(isset($data['rating'])){
            $rating = $data['rating'];
            $values = $this->model->checkRating($client,  $id, $_SESSION["register"]);
            $valueswatched = $this->model->checkWatched($client, $id, $_SESSION["register"]);
            $valuesWatchlist = $this->model->checkWatchlist($client, $id, $_SESSION["register"]);
            if(!$values[0]){
                if($valueswatched[0]){
                    $result = $this->model->AddRating($client, $id, $_SESSION["register"], $rating);
                    header("Location: ". $_SERVER["PHP_SELF"]. "?". $_SERVER["QUERY_STRING"]);
                }
                else{
                    if($valuesWatchlist[0]){
                        $this->model->deleteWatchlist($client, $id, $_SESSION["register"]);
                    }
                    $this->model->addWatched($client, $id, $_SESSION["register"]);
                    $result = $this->model->AddRating($client, $id, $_SESSION["register"], intval($rating));
                    header("Location: ". $_SERVER["PHP_SELF"]. "?". $_SERVER["QUERY_STRING"]);
                }
            }
        }
        else if(isset($_POST["watched"])){
            $valuesWatchlist = $this->model->checkWatchlist($client, $id, $_SESSION["register"]);
            if($valuesWatchlist[0]){
                $this->model->deleteWatchlist($client, $id, $_SESSION["register"]);
            }
            $this->model->addWatched($client, $id, $_SESSION["register"]);
            header("Location: ". $_SERVER["PHP_SELF"]. "?". $_SERVER["QUERY_STRING"]);
        
        }
        else if(isset($_POST["unwatch"])){
            $this->model->deleteWatched($client, $id, $_SESSION["register"]);
            header("Location: ". $_SERVER["PHP_SELF"]. "?". $_SERVER["QUERY_STRING"]);
        
        
        }
        else if(isset($_POST["upload_review"])){
            $this->model->addReview($client, $id, $_SESSION["register"], $_POST["review_text"]);
            header("Location: ". $_SERVER["PHP_SELF"]. "?". $_SERVER["QUERY_STRING"]);
        }
        else if(isset($_POST["addWatchlist"])){
            $this->model->addWatchlist($client, $id, $_SESSION["register"]);
            header("Location: ". $_SERVER["PHP_SELF"]. "?". $_SERVER["QUERY_STRING"]);
        }
        else if(isset($_POST["removeWatchlist"])){
            $this->model->deleteWatchlist($client, $id, $_SESSION["register"]);
            header("Location: ". $_SERVER["PHP_SELF"]. "?". $_SERVER["QUERY_STRING"]);
        }
    }
    public function showFilm($id){
        $client = $this->model->getClient();
        $film = $this->model->getFilm($client, $id);
        if(isset($_SESSION["register"])){
        $valueWatched = $this->model->checkWatched($client, $id, $_SESSION["register"]);
        $valueRated = $this->model->checkRating($client,  $id, $_SESSION["register"]);
        $valueReview= $this->model->checkReview($client,$id,$_SESSION["register"]);
        $valuesWatchlist = $this->model->checkWatchlist($client, $id, $_SESSION["register"]);
        if($valueReview[0]){
            $user = $this->model->getUser($client, $valueReview[1]["user_id"]);
        }
        }
        include("views/filmView.php");
    }
    

}
?>