<?php include("includes/header.php"); ?>

<?php

if(!$session->is_signed_in()) {
    redirect("../index.php");
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

<?php include("korisnici.php"); ?>

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>