<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
    }

  $req=$bdd->prepare('INSERT INTO messages(contenu,nom) VALUES (:contenu,:nom)');
  $req->execute(array(
  'contenu'=>$_POST['message'],
  'nom'=>$_POST['pseudo']
  ));
  
  header('Location: main_page.php');

?>