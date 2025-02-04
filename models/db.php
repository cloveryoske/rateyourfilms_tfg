<?php
require 'vendor/autoload.php';
use MongoDB\BSON\ObjectId;
class Model
{
    private $client;
    function __construct()
    {
        $this->client = new MongoDB\Client("mongodb://localhost:27017");
    }
    function getClient(){
        return $this->client;
    }
    function insertFilm($client, $doc)
    {
        $db = $client->project;
        $collection = $db->films;
        $result = $collection->insertOne($doc);
        var_dump($result);

    }
    function checkFilm($client, $title)
    {
        $db = $client->selectDatabase("project");
        $collection = $db->films;
        $result = $collection->find(['title' => $title]);
        if (!$result->isDead()) {
            return true;
        } else {
            return false;
        }

    }

    function addUser($client, $username, $password, $email)
    {
        $db = $client->project;
        $collection = $db->users;
        $result = $collection->insertOne(['username' => $username, 'password' => $password, 'email' => $email, "description" => "", "favorites" => []]);
        return $result;

    }
    function updateData($client, $id, $username, $email, $desc = "")
    {
        $db = $client->project;
        $collection = $db->users;
        $result = $collection->updateOne(["_id" => $id], ['$set' => ["username" => $username, "email" => $email, "description" => $desc]]);
        return $result->getMatchedCount();
    }
    function checkUser($client, $username)
    {
        $arrayResult = [];
        $db = $client->selectDatabase("project");
        $collection = $db->users;
        $result = $collection->find(["username" => $username]);
        if (!$result->isDead()) {
            return true;
        } else {
            return false;
        }

    }
    function getUser($client, $id)
    {
        $db = $client->selectDatabase("project");
        $collection = $db->users;
        $oid = new MongoDB\BSON\ObjectId($id);
        $result = $collection->findOne(["_id" => $oid]);
        if ($result != null) {
            return $result;

        } else {
            return null;
        }
    }
    function getFilm($client, $id)
    {
        $db = $client->selectDatabase("project");
        $collection = $db->films;
        $oid = new MongoDB\BSON\ObjectId($id);
        $result = $collection->findOne(['_id' => $oid]);
        if ($result != null) {
            return $result;

        } else {
            return null;
        }
    }

    function checkLogIn($client, $username, $password)
    {
        $arrayResult = [];
        $db = $client->selectDatabase("project");
        $collection = $db->users;
        $result = $collection->findOne(['username' => $username, 'password' => $password]);
        if ($result != null) {
            $arrayResult[0] = true;
            $arrayResult[1] = $result["_id"];
            return $arrayResult;
        } else {
            $arrayResult[0] = false;
            return $arrayResult;
        }

    }
    function showAllUsers($client)
    {
        $db = $client->project;
        $collection = $db->users;
        $cursor = $collection->find();
        return $cursor;
    }
    function getAllFilms($client)
    {
        $db = $client->project;
        $collection = $db->films;
        $cursor = $collection->find();
        return $cursor;

    }

    function AddRating($client, $id_film, $id_user, $rating)
    {
        $db = $client->project;
        $collection = $db->ratings;
        $rated_on = date('Y-m-d H:i:s');
        $id_film = new ObjectId($id_film);
        $result = $collection->insertOne(["film_id" => $id_film, "user_id" => $id_user, "rating" => $rating, "rated_on" => $rated_on]);
        return $result;


    }
    function checkRating($client, $id_film, $id_user)
    {
        $arrayResult = [];
        $db = $client->project;
        $collection = $db->ratings;
        $id_film = new ObjectId($id_film);
        $user_id = new ObjectId($id_user);
        $result = $collection->findOne(["film_id" => $id_film, "user_id" => $user_id]);
        if ($result != null) {
            $arrayResult[0] = true;
            $arrayResult[1] = $result;
            return $arrayResult;
        } else {
            $arrayResult[0] = false;
            return $arrayResult;
        }
    }
    function checkWatched($client, $id_film, $id_user)
    {
        $arrayResult = [];
        $db = $client->project;
        $collection = $db->watched;
        $result = $collection->findOne(["film_id" => $id_film, "user_id" => $id_user]);
        if ($result != null) {
            $arrayResult[0] = true;
            $arrayResult[1] = $result;
            return $arrayResult;

        } else {
            $arrayResult[0] = false;
            return $arrayResult;
        }
    }
    function addWatched($client, $id_film, $id_user)
    {
        $db = $client->project;
        $collection = $db->watched;
        $watched_on = date('Y-m-d H:i:s');
        $result = $collection->insertOne(["film_id" => $id_film, "user_id" => $id_user, "watched" => true, "watched_on" => $watched_on]);
        return $result;
    }

    function deleteWatched($client, $id_film, $id_user)
    {
        $db = $client->project;
        $collection = $db->watched;
        $collection->DeleteOne(["film_id" => $id_film, "user_id" => $id_user]);
    }
    function getWatchlistFilms($client, $id_user){
        $db = $client->project;
        $collection = $db->watchlist;
        $id_user = new ObjectId($id_user);
        $cursor = $collection->find(["user_id" => $id_user]);
        return $cursor;
    }
    function addWatchlist($client, $id_film, $id_user){
        $db = $client->project;
        $collection = $db->watchlist;
        $id_film = new ObjectId($id_film);
        $id_user = new ObjectId($id_user);
        $added_on = date('Y-m-d H:i:s');
        $result = $collection->insertOne(["film_id" => $id_film, "user_id" => $id_user, "added_on" => $added_on]);
        return $result;
    }
    function deleteWatchlist($client, $id_film, $id_user){
        $db = $client->project;
        $collection = $db->watchlist;
        $id_film = new ObjectId($id_film);
        $id_user = new ObjectId($id_user);
        $collection->DeleteOne(["film_id" => $id_film, "user_id" => $id_user]);
    }
    function checkWatchlist($client, $id_film, $id_user){
        $arrayResult = [];
        $db = $client->project;
        $collection = $db->watchlist;
        $id_film = new ObjectId($id_film);
        $id_user = new ObjectId($id_user);
        $result = $collection->findOne(["film_id" => $id_film, "user_id" => $id_user]);
        if ($result != null) {
            $arrayResult[0] = true;
            $arrayResult[1] = $result;
            return $arrayResult;

        } else {
            $arrayResult[0] = false;
            return $arrayResult;
        }
    }


    function addReview($client, $id_film, $id_user, $review)
    {
        $db = $client->project;
        $collection = $db->reviews;
        $fecha = new DateTime();
        $result = $collection->InsertOne(["film_id" => $id_film, "user_id" => $id_user, "review" => $review, "reviewed_on" => $fecha->format('Y-m-d H:i:s')]);
        var_dump($result);
        return $result;
    }
    function checkReview($client, $id_film, $id_user)
    {
        $arrayResult = [];
        $db = $client->project;
        $collection = $db->reviews;
        $result = $collection->findOne(["film_id" => $id_film, "user_id" => $id_user]);
        if ($result != null) {
            $arrayResult[0] = true;
            $arrayResult[1] = $result;
            return $arrayResult;

        } else {
            $arrayResult[0] = false;
            return $arrayResult;
        }
    }
    function deleteFilm($client, $id_film)
    {
        $db = $client->project;
        $collection = $db->films;
        $id_film = new ObjectId($id_film);
        $result = $collection->DeleteOne(["_id" => $id_film]);
        return $result->getDeletedCount();

    }
    function getFilmsByGenre($client, $param)
    {
        $db = $client->project;
        $collection = $db->films;
        $cursor = $collection->find(["genres" => $param]);
        return $cursor;
    }
    function getWatchedByUser($client, $user_id)
    {
        $db = $client->project;
        $collection = $db->watched;
        $user_id = new ObjectId($user_id);
        $cursor = $collection->find(["user_id" => $user_id]);
        return $cursor;

    }

    function changePoster($client, $film_id, $poster_url)
    {
        $db = $client->project;
        $collection = $db->films;
        $film_id = new ObjectId($film_id);
        $result = $collection->updateOne(["_id" => $film_id], ['$set' => ["poster_url" => $poster_url]]);
        return $result->getMatchedCount();
    }
    function ratingAllFilmsPipeline($client)
    {
        $db = $client->project;
        $films = $db->films;
        $ratings = $db->ratings;

        $pipeline = [
            [
                '$lookup' =>
                    [
                        'from' => 'ratings',
                        'localField' => '_id',
                        'foreignField' => 'film_id',
                        'as' => 'arrayRatings'
                    ]
            ],
            [
                '$addFields' => [
                    'ratings_count' => ['$size' => '$arrayRatings'],
                ]
            ],
            [
                '$project' => [
                    'title' => 1,
                    'arrayRatings' => 1,
                    'ratings_count' => 1,
                ]
            ]

        ];

        $results = $films->aggregate($pipeline);
        return $results;
    }
    function ratingsOneFilm($client, $film_id)
    {
        $db = $client->project;
        $films = $db->films;
        $film_id = new ObjectId($film_id);
        $pipeline = [
            [
                '$match' => [
                    '_id' => $film_id
                ]
            ],
            [
                '$lookup' =>
                    [
                        'from' => 'ratings',
                        'localField' => '_id',
                        'foreignField' => 'film_id',
                        'as' => 'arrayRatings'
                    ]
            ],
            [
                '$addFields' => [
                    'ratings_count' => ['$size' => '$arrayRatings'],
                ]
            ],
            [
                '$project' => [
                    'title' => 1,
                    'year' => 1,
                    'arrayRatings' => 1,
                    'ratings_count' => 1
                ]
            ]

        ];

        $results = $films->aggregate($pipeline);
        return $results;
    }

    function searchFilm($client, $name){
        $db = $client->project;
        $films = $db->films;
        $result = $films->find(["title" => new MongoDB\BSON\Regex($name, "i")]);
        return $result;
    }
    function getRandomDocuments($client){
        $db = $client->project;
        $collection = $db->films;
        $result = $collection->aggregate([
            ['$sample' => ['size' => 5]] // Fetch 1 random document
        ]);
        return $result;
    }
    function getFilmsByGenreLimited($client, $param, $limit = 5){
        $db = $client->project;
        $collection = $db->films;
        $cursor = $collection->find(["genres" => $param],["limit" => $limit]);
        return $cursor;


    }

}





?>