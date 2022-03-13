<?php
const KEY = "AIzaSyC9rIQvHxmZmzkpWmlQqaawJQk31dyxgc4";
const channelID = "UCekKhkXSv6RdD9rXkW2ZvDA";
const part = "snippet,statistics,contentDetails";
const refresh_token_url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=IGQVJVamJkMXJjQURyTlFaUEpWcnh0NEJUN3ZAab3BJNmlhWlBTSHpmb0RxODhXdll4M3QzSjVUQTlhUDdUa1FQdHlkWmQ0ZADZAsOWxiSFF1VUVHLWZACdk1HaUs3dTVxaFlGOEZAoUHln";

function get_curl($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, 1);
}

// function post_curl($url, $params)
// {
//     $def_options = array(
//         CURLOPT_URL => $url,
//         CURLOPT_POST => true,
//         CURLOPT_POSTFIELDS => $params,
//     );
//     $curl = curl_init();
//     curl_setopt_array($curl, $def_options);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//     $result = curl_exec($curl);
//     curl_close($curl);
//     var_dump($result);
//     exit;
// }

// Channel information
$result = get_curl("https://www.googleapis.com/youtube/v3/channels?part=" . part . "&id=" . channelID . "&key=" . KEY);

$ytChannelPic = $result["items"][0]["snippet"]["thumbnails"]["medium"]["url"];
$ytChannelName = $result["items"][0]["snippet"]["title"];
$ytChannelSubs = $result["items"][0]["statistics"]["subscriberCount"];


// Latest Video
$result = get_curl("https://www.googleapis.com/youtube/v3/search?key=" . KEY . "&part=snippet&channelId=" . channelID . "&order=date&type=video");

$ytLatestVideo = $result["items"][0]["id"]["videoId"];


// Instagram API
// $refresh = get_curl(refresh_token_url);
// $access_token = $refresh["access_token"];

// $ig = get_curl("https://www.instagram.com/dikdns/channel?__a=1")["graphql"]["user"];
// $igProfileUser = $ig["username"];
// $igProfilePic = $ig["profile_pic_url"];
// $igProfileFollow = $ig["edge_followed_by"]["count"];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/89851fc4a2.js" crossorigin="anonymous"></script>

    <!-- MY CSS -->
    <link rel="stylesheet" href="style.css">


    <title>Andika Eka Kurnia</title>
</head>

<body class="">

    <!-- NAV BAR -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Andika Eka Kurnia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END of NAV BAR -->

    <!-- JUMBOTRON -->
    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container text-center">
            <img src="img/profile1.png" alt="Andika Eka Kurnia" width="25%" class="rounded-circle img-thumbnail">
            <h1 class="display-4">Andika Eka Kurnia</h1>
            <p class="lead">Game Enthusiast | Student | Web Devoloper</p>
        </div>
    </div>
    <!-- END of JUMBOTRON -->

    <!-- ABOUT -->
    <section class="about pt-5" id="about">
        <div class="container">
            <div class="row mt-5">
                <div class="col text-center">
                    <h2>About</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Cum officiis, recusandae ipsam unde saepe nemo. Dolorum consequatur odio iusto. Quas laudantium ipsam deleniti earum consequuntur perspiciatis fugit magnam nemo quaerat ratione dolore non reiciendis, facilis delectus blanditiis, vero officiis dolores distinctio tenetur ipsum excepturi doloremque autem alias porro! Magnam, blanditiis.</p>
                </div>
                <div class="col-md-5">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod deleniti placeat nam repellendus temporibus quas voluptates fugit culpa! Ipsum nesciunt, eos, quos consectetur corporis delectus ratione soluta distinctio non sequi.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END of ABOUT -->

    <!-- SOCIAL MEDIA  -->
    <section class="social bg-light" id="social">
        <div class="container">
            <div class="row pt-5 mb-5">
                <div class="col text-center">
                    <h2>Social Media</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $ytChannelPic; ?>" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5><?= $ytChannelName; ?></h5>
                            <p><?= $ytChannelSubs; ?> Subscribers.</p>
                            <div class="g-ytsubscribe" data-channelid="UCekKhkXSv6RdD9rXkW2ZvDA" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                    <div class="row mt-3 pb-3">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $ytLatestVideo; ?>?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $ytChannelPic; ?>" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5>@<?= $igProfileUser; ?></h5>
                            <p><?= $igProfileFollow; ?> Followers.</p>
                            <div class="igfollow">
                                <a href="https://www.instagram.com/<?= $igProfileUser; ?>/">
                                    Follow
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 pb-3">
                        <div class="col">
                            <div class="ig-thumbnail">
                                <img src="img/thumbs/3.png">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/thumbs/5.png">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/thumbs/1.png">
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- END OF SOCIAL MEDIA -->

    <!-- PORTFOLIO -->
    <section class="portfolio pb-5" id="portfolio">
        <div class="container">
            <div class="row pt-5 mb-5">
                <div class="col text-center">
                    <h2>Portfolio</h2>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <div class="card">
                        <img class="card-img-top" src="img/thumbs/1.png" alt="Card Image Cap">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, delectus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img class="card-img-top" src="img/thumbs/2.png" alt="Card Image Cap">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, delectus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img class="card-img-top" src="img/thumbs/3.png" alt="Card Image Cap">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, delectus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <div class="card">
                        <img class="card-img-top" src="img/thumbs/4.png" alt="Card Image Cap">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, delectus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img class="card-img-top" src="img/thumbs/5.png" alt="Card Image Cap">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, delectus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img class="card-img-top" src="img/thumbs/6.png" alt="Card Image Cap">
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, delectus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END of PORTFOLIO -->

    <!-- CONTACT -->
    <section class="contact bg-light pt-5 pb-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Contact</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3 text-center">
                        <div class="card-body">
                            <h3 class="card-title">Contact Us</h3>
                            <p class="card-text">Lorem ipsum, dolor, sit amet consectetur adipisicing elit. Iure ipsam inventore itaque incidunt voluptatibus eligendi?</p>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h3>Location</h3>
                        </li>
                        <li class="list-group-item">My Office</li>
                        <li class="list-group-item">Lorem ipsum dolor, sit amet.</li>
                        <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="tel" class="form-control" id="telp">
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea name="pesan" class="form-control" id="pesan"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Kirim Pesan!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END of CONTACT -->

    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-3">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <p>&copy; Copyright 2020</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- END of FOOTER -->









    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>