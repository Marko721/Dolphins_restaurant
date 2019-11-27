<?php include("includes/header.php"); ?>

<?php

if(!$session->is_signed_in()) {
    redirect("login.php");
}

?>

<?php 

if(empty($_GET['id'])) {

    redirect("stolovi.php");

}

$konobari = User::find_this_query("SELECT * FROM users WHERE status='konobar' ");
$sto = Sto::find_sto_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($sto) {
        $sto->id_konobara = $_POST['id_konobara'];

        $sto->update_konobar();
        redirect("management.php");
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
            Dodeli novog Konobara
            <small>sto broj <?php echo $sto->id ?></small>
        </h1>

        <form action="" method="post">

        <div class="col-md-6 col-md-offset-3">
        
            <div class="form-group">
            <label for="broj stolica">Konobar</label>
            <select class='form-control' name='id_konobara'>
                <?php
                foreach ($konobari as $konobar) {
                    echo "<option value='$konobar->id'>{$konobar->username}</option>";
                } 
                ?>
            </select>
            </div>

            <div class="form-group">
            <input type="submit" name="update" value="Dodeli" class="btn btn-primary btn " >
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