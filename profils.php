<?php 
require("head.php");
if(empty($_SESSION)){
    header("Location: login.php");
}
?>

<h1>poudy</h1>
<a href="functions/disconnect.php">disconnect</a> ;

<div class="pseudo">
    <?php

    //1 connect to database
    require("functions/dataBase.php");
    //2 prepare request (select)
    $req = $db->prepare("SELECT pseudo FROM users WHERE pseudo <> :pseudo");
    $req->bindParam(":pseudo",$_SESSION["pseudo"]);
    //3 execute
    $req->execute();
    //4 boucle
    while($result = $req->fetch(PDO::FETCH_ASSOC)){
        // var_dump($result["pseudo"]);
        if($_SESSION["pseudo"] != $result["pseudo"]){
            echo "<h2>" . $result["pseudo"] . "</h2>";
        }
    }

    ?>
</div>


<?php
echo "bonjour" . $_SESSION["pseudo"];