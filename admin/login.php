<?php require_once("includes/header.php"); ?>

<?php

if($session->is_signed_in()) {

    redirect("index.php");

}

if(isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user_found = User::verify_user($username, $password);

    if($user_found) {
        
        $session->message("Welcome");
        $session->login($user_found);
        redirect("index.php");

    } else {

        $the_message = "Your password or username is incorrect";

    }


} else {

    $the_message = "";
    $username = "";
    $password = "";

}

?>


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>






























