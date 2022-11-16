<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>

    <body>
        <form method="POST" action="sec_page.php">
        <p>
        <label for="010">Pseudo</label>    
        <input type="text" name="pseudo" id="010" required="">

        <br>
        <label for="011">Message</label>
        <input type="text" name="message" id="011">
        </p>
        <br>
        <input type="submit" value="Envoyer">

        </form>
        <br><br><br>   

        <?php
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch (Exception $e){
                    die('Erreur : ' . $e->getMessage());
            }

            $ans=$bdd->query('SELECT nom,contenu FROM messages ORDER BY id DESC');
            while($ligne=$ans->fetch()){
                echo '<strong>'.htmlspecialchars($ligne['nom']).'</strong>: '.htmlspecialchars($ligne['contenu']);?><br>
            <?php
            }
            $ans->closeCursor();
        ?>
    </body>
</html>