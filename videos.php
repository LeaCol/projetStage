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

try {   
    
    $videos = $youtube->search->listSearch('id,snippet',['channelId'=> $_POST['identifiantChaine'], 'order' => 'date', 'maxResults' => 10, 'type' => 'video']);

    $chaines = $youtube->channels->listChannels('snippet',['id'=> $_POST['identifiantChaine']]);
} 
catch (Exception $e){
    header('Location:index.php');
    }
?>
<div class="jumbotron">
    <?php foreach($chaines['items'] as $chaine):?>
    <h1><?= $chaine['snippet']['title'];?></h1>
    <?php endforeach;?>
</div>
    
<div class= "container"> 
    
    <div class="row">
        <?php foreach($videos['items'] as $video):?>
        <div class="col-md-6 col-sm-4">
            <div class="thumbnail">
                <img src="<?= $video['snippet']['thumbnails']['high']['url'];?>" width="100%">
                <div class="caption">
                    <a href="http://www.youtube.com/watch?v=<?=$video['id']['videoId']?>"><?= $video['snippet']['title']; ?></a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div> 
    
</html>