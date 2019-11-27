<?php include("includes/header.php"); ?>

<?php

if(!$session->is_signed_in()) {
    redirect("login.php");
}

?>

<?php 

$sto = new Sto();

if(isset($_POST['create'])) {

    if ($sto) {
        $sto->broj_stolica   = $_POST['broj_stolica'];
        $sto->create();

        redirect("stolovi.php");
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
            Stolovi
            <small>Dodaj Sto</small>
        </h1>

        <form action="" method="post">

        <div class="col-md-6 col-md-offset-3">
        
            <div class="form-group">
            <label for="broj stolica">Unesi zeljeni broj stolica</label>
            <select class="form-control" name="broj_stolica">
            <?php

            for($i=0; $i<=5; $i++) {
                echo "<option value={$i}>{$i}</option>";
            }

            ?>
            </select>
            </div>

            <div class="form-group">
            <input type="submit" name="create" value="Dodaj sto" class="btn btn-primary btn " >
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