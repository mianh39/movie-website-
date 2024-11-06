<?php
    session_start();
    include('API/conn.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $films = film($id);
        $film = $films[0];
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .trailer iframe{
            width: 80%;
            height: 430px;
        }
        /* Mobile devices */
        @media only screen and (max-width: 768px) {
            section {
                height: 1300px !important;
            }
            .header {
                height: auto;
            }

            .logo_ul {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .logo_ul img {
                width: 50%;
                margin-bottom: 1rem;
            }

            .account {
                /* margin-top: 1rem; */
            }

            .backdrop {
                height: 50vh;
            }

            .container-film {
                flex-direction: column;
                align-items: center;
            }

            .avt {
                width: 80%;
                margin-top: 2rem;
            }

            .avt img {
                width: 100%;
            }

            .description {
                /* width: 80%; */
            }

            .title {
                font-size: 2rem;
                margin-top: 2rem;
            }

            .year {
                font-size: 1.5rem;
                margin-top: 0.5rem;
            }

            .long {
                font-size: 1.5rem;
                margin-top: 0.5rem;
            }

            .director {
                font-size: 1.5rem;
                margin-top: 0.5rem;
            }

            .genres {
                font-size: 1.5rem;
                margin-top: 0.5rem;
            }

            .des {
                font-size: 1.5rem;
                margin-top: 1rem;
            }

            .trailer {
                font-size: 1.5rem;
                margin-top: 1rem;
            }

            .trailer iframe {
                width: 150% !important;
                height: 200px !important;
            }
            .des{
                display: none;
            }
            .trailer{
                width: 60%;
                margin-top: 1rem;
            }
            .logo_ul img{
                display: none;
            }
            section{
                height: 1200px !important;
            }
        }


        /* Tablets and small desktops */
        @media only screen and (min-width: 768px) and (max-width: 992px) {
            section{
                height: 1000px !important;
            }
            .backdrop {
                height: 60vh;
            }

            .container-film {
                flex-direction: row;
                justify-content: space-between;
            }

            .avt {
                width: 40%;
                margin-top: 5rem;
            }

            .description {
                width: 50%;
                margin-top: 5rem;
            }
            .trailer{
                width: 80%;
                /* margin-top: 1rem; */
            }
            .trailer iframe {
                width: 200% !important;
                height: 200px !important;
            }
        }


    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./movie.css">
    <script src="https://kit.fontawesome.com/7c1522be31.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&family=Montserrat:wght@900&family=Poppins:wght@100;300;500;600&family=Ubuntu&display=swap" rel="stylesheet">
    <title>Movie</title>
</head>
<body>
    <header class="header">
        <div class="content">
            <div class="logo_ul">
                <img src="img/logo.png" alt="">
                <ul>
                    <li>
                        <a href="./index.php"><span>Home</span></a>
                    </li>
                </ul>
            </div>
            <div class="account">
                <?php
                if(!isset($_SESSION['username'])){?>
                    <!-- Thêm đường dẫn hiện tại vào URL đăng nhập -->
                    <a href="login.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Log in</a>
                <?php
                }else{?>
                    <a href="logout.php"><?php echo $_SESSION['username']; ?>- Log out here</a>
                <?php
                }
                ?>
            </div>
        </div>
    </header>
    <div style ="background-image: url(<?=$film['poster1']?>);" class="backdrop">
    </div>
    <section>
        <div class="container">
            <div class="container-film">
                
                <div class="avt">
                    <img src="<?=$film['poster']?>" alt="">
                    <button class="watch" id="watch-film"><span>Watch <i class="fa-solid fa-play"></i></span></button>
                    <?php
                    if(!isset($_SESSION['username'])){?>
                        <div class="text" style="color:white; text-align:center;padding-top:10px;">Please log in to watch rate this film.</div>
                    <?php
                    }else{?>
                        <div class="rate">
                        <div class="post">
                            <div class="text">Thanks for your feedback!</div>
                        </div>
                        <div class="star-widget">
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fa-solid fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fa-solid fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fa-solid fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fa-solid fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fa-solid fa-star"></label>
                            <form action="">
                                <header ></header>
                                <div class="textarea">
                                    <textarea cols="30" placeholder="Describe your experience..."></textarea>
                                </div>
                                <div class="rate-btn">
                                    <button id="post" type="submit">Post</button>
                                </div>
                            </form>
                        </div>
                        <!-- <span class="st">(5 out of 5)</span> -->
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="description">
                    <h1 class="title"><?=$film['Name']?></h1>
                    <h5 class="year">(<?=$film['year']?>)</h5>
                    <h4 class="long"><?=$film['hours'] ?><span>IMDB</span><i class="fa-solid fa-star"></i> <?=$film['IMDB']?></h4>
                    <h3 class="director">Director: <?=$film['director']?></h3>
                    <h4 class="genres"><?=$film['genre']?></h4>
                    <p class="des"><?=$film['description']?></p>
                    

                    <div class="trailer">
                        <span>Trailer:</span>
                        <iframe id="iframe__src" src="https://youtube.com/embed/<?=$film['trailer']?>" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
   const navbar = document.querySelector('header');
    window.onscroll = () => {
        if (window.scrollY > 300) {
            navbar.classList.add('nav-active');
        } else {
            navbar.classList.remove('nav-active');
        }
    };

    const btn = document.querySelector('#post');
    const post = document.querySelector('.post');
    const widget = document.querySelector('.star-widget');

    btn.onclick = () => {
        widget.style.display = 'none';
        post.style.display = 'block';
        return false;
    }
    const find = window.location.search;
    const url = new URLSearchParams(find);

    let id = url.get('id');
    const watch = document.querySelector('#watch-film');
    watch.onclick = () => {
        if(id==1){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20231019/7AvbHMaF/index.m3u8";
        }
        else if(id==2){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20230919/HXJJrkZ6/index.m3u8";
        }
        else if(id==3){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20230910/f3CO8L7u/index.m3u8";
        }
        else if(id==4){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20231202/azqGe0RD/index.m3u8";
        }
        else if(id==5){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20230921/MndIKcb4/index.m3u8";
        }
        else if(id==6){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20230926/Kug4vG0j/index.m3u8";
        }
        else if(id==7){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20240218/QCnvtems/index.m3u8";
        }
        else if(id==8){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20230922/AqSXTRpV/index.m3u8";
        }
        else if(id==9){
            document.querySelector('#iframe__src').src = "https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20230922/WVFBi5Ry/index.m3u8";
        }
        else if(id==10){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s1.phim1280.tv/20240314/hTlBUG5e/index.m3u8";
        }
        else if(id==11){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20231019/XSCacRFH/index.m3u8";
        }
        else if(id==12){
            document.querySelector('#iframe__src').src = "https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20231019/KtOZHs57/index.m3u8";
        }
        else if(id==13){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20231125/rgjQWVZ3/index.m3u8";
        }
        else if(id==14){
            document.querySelector('#iframe__src').src ="https://player.phimapi.com/player/?url=https://s2.phim1280.tv/20230921/l0JJOk14/index.m3u8";
        }
    }

;
</script>
</html>