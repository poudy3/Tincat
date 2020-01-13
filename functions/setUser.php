<?php
require("dataBase.php");

var_dump($_POST);
// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    $message = "";
    
    if (empty($_POST['pseudo']) && empty($_POST['password']) ){
        $message = "Vous devez remplir les deux champs";
        header("location: ../register.php?message=$message");
    }else if (empty($_POST['pseudo']) && !empty($_POST['password']) ){
        $message = "Vous devez remplir un pseudo";
    }else if (!empty($_POST['pseudo']) && empty($_POST['password']) ){
        $message = "Vous devez remplir un mot de passe";
    }

    var_dump($message);
    
   if (!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['pseudo'])){
        if ($_POST['confirm_password'] === $_POST['password']){
            $req = $db->prepare("INSERT INTO users (pseudo, password, email) VALUES(:pseudo, :password, :email)");
            $req->bindParam(":pseudo", $_POST["pseudo"]);
            $req->bindParam(":password", $_POST["password"]);
            $req->bindParam(":email", $_POST["email"]);
            $req->execute();

            $message = "success create account";
            header("Location: ../login.php?message=$message");
        }else{
            $message = "Password and confirm Password not egal";
            header("location: ../register.php?message=$message");
        }
    }
    // Ajouter un input confirm password et vérifier si les deux sont égaux
 /*   if ( $_POST['confirm_password'] != $_POST['password'] ){
    echo "Les 2 mots de passe sont différents";
     
}*/

// Etape 3 : prepare request