<?php

if(isset($_COOKIE['auth']) && !isset($_SESSION['connect'])){

    //Variable
    $secret = htmlspecialchars($_COOKIE['auth']);

    // verif

    require ('src/connect.php');

    $req = $db->prepare("SELECT count(*) as numberAccount From user WHERE secret = ?");
    $req->execute(array($secret));

    while ($user = $req->fetch()){

        if($user['numberAccount'] == 1){

            $reqUser = $db->prepare("SELECT * From user WHERE secret = ?");
            $reqUser->execute(array($secret));

            while ($userAccount = $reqUser->fetch()){

                $_SESSION['connect'] = 1;
			    $_SESSION['email'] = $userAccount['email'];
            }
        }

    }

}



?>
