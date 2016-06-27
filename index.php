<!Doctype html>
<html>

<?php include("header.php"); ?>

<?php

require('vendor/autoload.php');

$key = "AIzaSyDPSggxY_oDtqejaGHYnFiDVrCWenV2ls4";
$client = new Google_Client();
$client->setDeveloperKey($key);

$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$client->setHttpClient($guzzleClient);

$youtube = new Google_Service_Youtube($client);

    
$videos = $youtube->search->listSearch('id,snippet',['channelId'=> 'UC09UzgeNNIyO3-bVrUHRwRA', 'order' => 'date', 'maxResults' => 10, 'type' => 'video']);
    ?>
    
<div class="jumbotron">
    <h1>Les 10 dernières vidéos de ta chaîne <i class="fa fa-youtube" aria-hidden="true"></i> préférée</h1>
</div>
    
<div class= "container"> 
    <div class="row">
        <div class="col-md-4">
            <p>Identifiant de la chaine YouTube: </p>
        </div>
        <div class="col-md-8">
            <form action="videos.php" method="post">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">http://www.youtube.com/channel/</span>
                    <input type="text" name="identifiantChaine" class="form-control" placeholder="Identifiant" aria-describedby="basic-addon1">
                </div>
                 <button type="submit" class="btn btn-warning">Rechercher</button>
            </form>
        </div>
    </div>
</div> 
    
</html>