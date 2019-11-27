<?php include("includes/init.php"); ?>

<?php

if(!$session->is_signed_in()) {
    redirect("../index.php");
}

if(empty($_GET['id'])) {

    redirect("index.php");

} 

$sto = Sto::find_sto_by_id($_GET['id']);

$sto->delete();
$session->message("<p class='bg-success'>Table number {$sto->id} has been deleted successefully</p>");
redirect("stolovi.php");



// print_r($user);






















?>

