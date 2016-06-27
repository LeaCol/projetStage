<!Doctype html>
<html>

    <!-- Code php de l'entête -->
<?php include("header.php"); ?>

    <!-- récupération des librairies nécessaires (ex: apiclient) -->
<?php require('vendor/autoload.php');?>
    
<div class="jumbotron">
    <h1>Les 10 dernières vidéos de ta chaîne <i class="fa fa-youtube" aria-hidden="true"></i> préférée</h1>
</div>
    
<div class= "container"> 
    <div class="row">
        <div class="col-md-4">
            <p>Identifiant de la chaine YouTube: </p>
        </div>
        <div class="col-md-8">
            
            <!-- Formulaire pour récupérer l'identifiant de la chaine youtube -->
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