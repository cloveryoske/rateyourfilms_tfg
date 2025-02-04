<?php
require_once("models/db.php");
class RegisterController
{
    private $model;
    public function __construct()
    {
        $this->model = new Model();
    }
    public function showRegister()
    {
        include("views/registerView.php");

    }
    public function requests()
    {
        if (isset($_POST["register"])) {
            $username = $_POST["username"] ?? "";
            $client = $this->model->getClient();
            if ($this->model->checkUser($client, $username)) {
                echo "el usuario ya esta en la base de datos!";
            } else {
                $password = md5($_POST["pass"]) ?? "";
                $email = $_POST["email"] ?? "";
                $result = $this->model->addUser($client, $username, $password, $email);
                header("Location: index.php?view=login");

            }
        }
    }




}
?>