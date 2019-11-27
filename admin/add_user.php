<?php include("includes/header.php"); ?>

<?php

if(!$session->is_signed_in()) {
    redirect("login.php");
}

?>

<?php 

$user = new User();

if(isset($_POST['create'])) {

    if ($user) {
        $user->username   = $_POST['username'];
        $user->password   = $_POST['password'];
        $user->status     = $_POST['status'];
        $user->parent     = $session->user_id;

        $user->create();
        redirect("index.php");
    }

}

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
<?php include("includes/top_nav.php") ?>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            

<?php include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>




        <div id="page-wrapper">

        <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Admin
            <small>Dodaj Korisnika</small>
        </h1>

        <form action="" method="post">

        <div class="col-md-6 col-md-offset-3">
        
            <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
            </div>

            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="">
                <option value="konobar">Odaberite zeljeni status korisnika</option>

                <?php

                    if($session->status == 'superadmin') {

                        echo "<option value='admin'>Admin</option>";
                        echo "<option value='konobar'>Konobar</option>";

                    } elseif($session->status == 'admin') {

                        echo "<option value='konobar'>Konobar</option>"; 

                    }
                
                
                ?>

            </select>
            </div>

            <div class="form-group">
            <input type="submit" name="create" value="Create User" class="btn btn-primary btn " >
            </div>
            
        
        </div>

    </form>














    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>