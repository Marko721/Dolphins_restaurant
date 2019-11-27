<?php include("includes/init.php"); ?>

<?php

if(!$session->is_signed_in()) {
    redirect("../index.php");
}

if(empty($_GET['id'])) {

    redirect("index.php");

} 

$user = User::find_user_by_id($_GET['id']);

if($user->parent == $session->user_id) {

    $user->delete();
    $session->message("<p class='bg-success'>User {$user->username} has been deleted successefully</p>");
    redirect("index.php");

} else {

    $session->message("<p class='bg-danger'>You cannot delete {$user->username} because you didnt create him/her or you dont have admin privileges</p>");
    redirect("index.php");

}

// print_r($user);






















?>

