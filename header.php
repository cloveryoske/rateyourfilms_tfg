
<header>
<div class="title_elements">
        <h2 id="title" onclick="window.location.replace('index.php')">RATE YOUR FILMS</h2>
        <div id="genres_container"><a id='genres' href="index.php?view=genres">Genres</a></div>
        <div id="charts_container"><a id='charts' href="index.php?view=charts">Charts</a></div>
        <form method="post" action="index.php?view=search2" id="searchform">
        <input type="text" id="searchform" name="searchText" placeholder="Search...">
        <button type="submit" name="searchButton">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>
</form>

    </div>
        <?php
            if(isset($_SESSION["register"])){
                echo "<div id='menu_container'>
                        <button id='menuBurger' onclick='show()' onblur='hide()'>
                            <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='40' height='30' viewBox='0 0 24 24'>
                            <path d='M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z'></path>
                        </svg>
                        </button>
                        <ul id='menu'>
                            <li id='profile' onclick='redirectUser(this)'>PROFILE</li>
                            <li id='filmswatched' onclick='redirectUser(this)'>FILMS WATCHED</li>
                            <li id='watchlist'onclick='redirectUser(this)'>WATCHLIST</li>
                            <li id='settings'onclick='redirectUser(this)'>SETTINGS</li>
                            <li id='logout' onclick='redirectUser(this)'>LOGOUT</li>
                        </ul>
                        </div>";
            }
            else{
                echo "<button id='register' name='register' onclick='redirectUser(this)'>SIGN IN</button>";
            }
        ?>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function redirectUser(element){
        let userID = String("<?php echo $_SESSION["register"] ?? "";?>")
        window.location.href = "index.php" + "?id=" + userID + "&view="+element.id
    }
    function show(){
        $("#menu").slideToggle();
    }
    function hide(){
        $("#menu").slideUp()
    }

    


</script>
