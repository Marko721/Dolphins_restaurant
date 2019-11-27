<?php require_once("admin/includes/header.php"); ?>

<?php

if($session->is_signed_in()) {

    redirect("admin/index.php");

}

if(isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

//method to check database user
    $user_found = User::verify_user($username, $password);

    if($user_found) {

        $session->message("Welcome");
        $session->login($user_found);
        if($session->status == 'superadmin' || $session->status == 'admin') {
            redirect("index.php");
        } else {
            redirect("admin/konobar.php");
        }

    } else {

        $the_message = "Your password or username is incorrect";

    }


} else {

    $the_message = "";
    $username = "";
    $password = "";

}

if(isset($_POST['guest'])) {

    redirect("home.php");

}

?>



<div class="col-md-4 col-md-offset-4">

<div class="form-group">
    <img class="img-responsive" src="includes/images/logo1.png" alt="">
</div>

<h4 class="bg-danger"><?php echo $the_message; ?></h4>
	
<form id="login-id" action="" method="post">

<!-- <div class="form-group">
    <select class="form-control" name="log_as" id="">
        <option >Ulogujte se kao</option>
        <option value="admin">Admin</option>
        <option value="konobar">Konobar</option>
    </select>
</div> -->
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="">
	
</div>


<div class="clearfix">
<div class="pull-left">
<input type="submit" name="submit" value="Admin Log-in" class="btn btn-primary">
</div>
<div class="pull-right">
<input type="submit" name="guest" value="Pristupite kao gost" class="btn btn-primary">
</div>

</div>



</form>


</div>






























