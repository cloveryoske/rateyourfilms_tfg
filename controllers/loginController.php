<?php
class LoginController{
    private $model;
    public function __construct(){
        $this->model = new Model();
    }
    public function showLogin(){
        include("views/loginView.php");
    }
    public function requests(){
        if(isset($_POST["enviar"])){
            session_start();
            $username = $_POST["username"] ?? "";
            $client = $this->model->getClient();
            $password = md5($_POST["pass"]) ?? "";
            $values = $this->model->checkLogIn($client, $username, $password);
            if($values[0]){
                $_SESSION["register"] = $values[1];
                header("Location: index.php");
            }
            else{
                echo "USUARIO O CONTRASEÑA NO COINCIDEN";
            }
        
        }
    }



}

?>