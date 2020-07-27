<?php
require_once 'RESTful.php';
$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$response = curl_get($url);
$xml = simplexml_load_string($response);

// echo print_r($xml);


/* foreach ($xml->channel->item as $item) {
echo '<a href="'.$item->link.'" target="_blank">'.$item->title.'</a><br>';
} */

$url2 = 'http://rss.cnn.com/rss/edition_technology.rss';
$response = curl_get($url2);
$xml2 = simplexml_load_string($response);

// echo print_r($xml2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>BBC</h1>
        <div class="row">
            <?php foreach ($xml->channel->item as $item) : ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card mb-4 bg-white searchText-dark">
                        <img class="pet-picture" src='https://etimg.etb2bimg.com/photo/63375663.cms' class="d-inline-block d-none d-md-inline-block card-img-top" alt="tech picture">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->title ?></h5>
                            <p class="card-searchText"><?= $item->description ?></p>
                            <a href="<?= $item->link ?>" class="btn btn-dark" target="blank">Link</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <h1>CNN</h1>
        <div class="row">

            <?php foreach ($xml2->channel->item as $item) : ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card mb-4 bg-white searchText-dark">
                        <img class="pet-picture" src='https://cdn.cnn.com/cnn/.e1mo/img/4.0/logos/CNN_logo_400x400.png' class="d-inline-block d-none d-md-inline-block card-img-top" alt="tech picture">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->title ?></h5>
                            <p class="card-searchText"><?= $item->description ?></p>
                            <a href="<?= $item->link ?>" class="btn btn-dark" target="blank">Link</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="row">
            <div class="col-12">
                <button id="serri" class="btn btn-warning w-100 d-block">Get a Serri Joke</button>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>