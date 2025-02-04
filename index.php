
   <?php 
   session_start();
   require_once("controllers/filmController.php");
   require_once("controllers/indexController.php");
   require_once("controllers/loginController.php");
   require_once("controllers/registerController.php");
   require_once("controllers/searchController.php");
   require_once("controllers/watchlistController.php");
   require_once("controllers/watchedController.php");
   require_once("utilities.php");
    require_once("genresarray.php");
    require_once("viewFunctions.php");
   $uri = $_SERVER["REQUEST_URI"];
   $uri = strtok($uri, "?");
   $uri = trim($uri, "/");
   $filmController = new FilmController();
   $registerController = new RegisterController();
   $defaultController = new IndexController();
   $loginController = new LoginController();
   $searchController = new SearchController();
   $watchlistController = new WatchlistController();
   $watchedController = new WatchedController();
   $view = $_GET["view"] ?? "";
   switch($view){
        case "film":
            $id = $_GET["id"];
            $filmController = new FilmController();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $filmController->requests($id);
            }            
            $filmController->showFilm($id);
            break;
        case "register":
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $registerController->requests();
            }
            $registerController->showRegister();
            
            break;
        case "login":
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $loginController->requests();
            }
            $loginController->showLogin();
            break;
        case "logout":
            session_start();
            session_unset();
            session_destroy();
            header("Location: index.php");
            break;
        case "search2":
            $text = $_POST["searchText"] ?? "";
            $searchController->showSearch($text);
            break;
        case "watchlist":
            $user_id = $_GET["id"] ?? "";
            $watchlistController->ShowWatchlist($user_id);
            break;
        case "filmswatched":
            $user_id = $_GET["id"] ?? "";
            $watchedController->ShowWatched($user_id);
            break;

        default:
            $defaultController->showFilms();
            break;

   }
   
   ?>