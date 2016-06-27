<!Doctype html>
<html>

<?php 
include("header.php");
require('vendor/autoload.php');

    //Création d un client qui va récupérer les données des vidéos et des chaines voulues
$key = "AIzaSyAqWLUg905StnN4uYOwVFJU89cKV3CYvnA";
$client = new Google_Client();
$client->setDeveloperKey($key);

$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$client->setHttpClient($guzzleClient);

$youtube = new Google_Service_Youtube($client);

    //On essaye d'aller récupérer les informations, si le champ du formulaire est vide ou incomplet, on gère l'exception en restant sur la         page du formulaire.
try {   
    
    $videos = $youtube->search->listSearch('id,snippet',['channelId'=> $_POST['identifiantChaine'], 'order' => 'date', 'maxResults' => 10, 'type' => 'video']);

    $chaines = $youtube->channels->listChannels('snippet',['id'=> $_POST['identifiantChaine']]);
} 
catch (Exception $e){
    header('Location:index.php');
    }
?>
    
<div class="jumbotron">
    
    <!-- On récupère le nom de la chaine -->
    <?php foreach($chaines['items'] as $chaine):?>
    <h1><?= $chaine['snippet']['title'];?></h1>
    <?php endforeach;?>
    
</div>
    
<div class= "container"> 
    <div class="row">
        
        <!-- On affiche les 10 vidéos 1 par 1, classées par date, avec leur image et leur lien vers la page youtube -->
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