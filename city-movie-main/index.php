<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/7c1522be31.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Movies</title>
    <style>
        
        /* Styles for smaller screens */
        @media (max-width: 768px) {
            .logo_ul ul {
                display: none;
            }
            .search_user {
                margin-right: 0;
                margin-top: 20px;
                text-align: center;
            }
            .search_user form {
             display: none;

            }
            .search_user form input[type="text"] {
                width: 50%;
            }
            .content p {
                display: none;
            }
            .popular{
                display: none;
            }
            .search_user{
            }
            .genre-dropdown{
                display: none;
            }
        }

        /* Styles for larger screens */
        @media (min-width: 768px) {
            .logo_ul ul {
                display: flex;
                justify-content: flex-end;
                margin-right: 50px;
            }
            .search_user {
                margin-right: 50px;
            }
            .search_user form input[type="text"] {
                width: 300px;
            }
            

        }
    </style>
</head>
<body>

<header>
    <!-- Add a video background -->
    <video src="video/john wick.webm" autoplay muted></video>
    <nav>
        <div class="logo_ul">
            <img src="img/logo.png" alt="">
            <ul>
                <!-- Home link -->
                <li>
                    <a href="index.php"><span>Home</span></a>
                </li>
                <!-- Genres dropdown menu -->
                <li  class="genre-dropdown">
                    <a class="genre-dropdown"href="#">Genres</a>
                    <!-- Show all genres from the database -->
                    <div class="genre-dropdown-content">
                    <?php 
                        require_once("API/conn.php");
                        $result = show_genres();
                        foreach ($result as $name){
                    ?>
                        <a href="find.php?genre=<?=$name['name']?>"><?=$name['name']?></a>
                    <?php } ?>
                    </div>
                </li>
                  
                  
        </ul>
        </div>
        <div class="search_user">
            <!-- Search bar form -->
            <form action="find.php" method="POST">    
                <input type="text" placeholder="Search..." name="search_input" id="search_input">
                <!-- Link to user login page -->
                <?php
                    if (isset($_SESSION['username'])) {
                        echo '<img src="img/user.jpg" alt="">';
                    } else {
                        echo '<a href="login.php"><img src="img/user.jpg" alt=""></a>';
                    }
                ?>
            </form>
            <div class="search">
            </div>

        </div>
    </nav>
    <div class="content">
        <!-- Movie title and description -->
        <h1 id="title">John Wick: Chapter 3</h1>
        <p>Super-assassin John Wick returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin’s guild, the High Table, John Wick is excommunicado, but the world’s most ruthless hit men and women await his every turn.</p>
        <!-- Movie details -->
        <div class="details">
            <h6>Chad Stahelski</h6>
            <h5 id="gen">Action, Thriller, Crime</h5>
            <h4>2019</h4>
            <h3 id="rate"><span>IMDB</span><i class="fa-solid fa-star"></i>8.1</h3>
        </div>
        <!-- Play button link -->
        <div class="btns">
            <a href="./movie.php?id=12" id="play">Watch<i class="fa-solid fa-play"></i></a>
        </div>
    </div>

    <section>
        <!-- Display popular movies as cards -->
        <h3 class="popular">Popular:</h3>
        <div class="cards">
        <?php 
            require_once("API/conn.php");
            $result = show_film();
            foreach ($result as $name){
        ?>
            <!-- Link to movie details page -->
            <a href="movie.php?id=<?=$name['id']?>" class="card">
                    <img src="<?=$name['poster']?>" alt="" class="poster">
                </a>
            <?php 
                } 
            ?>      

            </div>
    </section>
</header>

    <script src="app.js"></script>
</body>
</html>