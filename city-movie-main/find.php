<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./find.css"> <!-- Importing the CSS file -->
    <script src="https://kit.fontawesome.com/7c1522be31.js" crossorigin="anonymous"></script> <!-- Importing the Font Awesome icon library -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&family=Montserrat:wght@900&family=Poppins:wght@100;300;500;600&family=Ubuntu&display=swap" rel="stylesheet"> <!-- Importing Google Fonts -->
    <title>Movie</title>
</head>
<body>
    <header>
        <div class="content">
            <div class="logo_ul">
                <img src="img/logo.png" alt=""> <!-- Adding a logo -->
                <ul>
                    <li>
                        <a href="./index.php"><span>Home</span></a> <!-- Adding a navigation link to the home page -->
                    </li>
                </ul>
            </div>
            <div class="account">
            <?php
                if(!isset($_SESSION['username'])){?>
                    <a href="login.php">Log in</a>
                <?php
                }else{?>
                    <a href="logout.php">Hello</a>
                <?php
                }
                ?>
            </div>
        </div>
    </header>
    <div class="tbody">
        <?php
            include('API/conn.php'); // Including the database connection file
            if(isset($_GET['genre'])){ // Checking if a genre has been selected
                $genres = $_GET['genre'];
                $films = genres($genres); // Retrieving movies based on the selected genre from the database
                if(isset($films) && $films){ // Checking if there are any movies in the selected genre
                    ?>
                <h1 class="genre"><?=$genres?> :</h1> <!-- Displaying the selected genre as a heading -->
                <div class="cards">
                <?php foreach($films as $a){ ?> <!-- Displaying each movie poster for the selected genre -->
                <a href="movie.php?id=<?=$a['id']?>" class="card">
                    <img src="<?=$a['poster']?>" alt="" class="poster">
                </a>     
        <?php }}}
            else if(isset($_POST['search_input'])){ // Checking if a search query has been submitted
                $name = $_POST['search_input'];
                $films = findName($name); // Retrieving movies based on the search query from the database
                if(isset($films) && $films){ // Checking if there are any movies that match the search query
                    ?>
                <h1 class="genre"><?=$name?> :</h1> <!-- Displaying the search query as a heading -->
                <div class="cards">
                <?php foreach($films as $a){ ?> <!-- Displaying each movie poster that matches the search query -->
                <a href="movie.php?id=<?=$a['id']?>" class="card">
                    <img src="<?=$a['poster']?>" alt="" class="poster">
                </a>  
                <?php }}}
                
            ?>
        </div>
    </div>
</body>
</html>
