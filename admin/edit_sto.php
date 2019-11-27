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

$sto = Sto::find_sto_by_id($_GET['id']);

if (isset($_POST['update'])) {
    if ($sto) {
        $sto->broj_stolica    = $_POST['broj_stolica'];
        $sto->rezervacija     = $_POST['rezervacija'];

        $sto->update();
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
            <small>Izmeni sto broj <?php echo $sto->id ?></small>
        </h1>

        <form action="" method="post">

        <div class="col-md-6 col-md-offset-3">
        
            <div class="form-group">
            <label for="broj stolica">Promeni zeljeni broj stolica</label>
            <select class="form-control" name="broj_stolica">
            <option value="<?php echo $sto->broj_stolica; ?>"><?php echo $sto->broj_stolica; ?></option>
            <?php

            for($i=0; $i<=5; $i++) {
                echo "<option value={$i}>{$i}</option>";
            }

            ?>
            </select>
            </div>

            <div class="form-group">
            <label for="rezervacija">Rezervisi:</label>
        
            <input type="radio" name="rezervacija" value="1" required="required">Da
            <input type="radio" name="rezervacija" value="0" required="required">Ne

            </div>

            <div class="form-group">
            <input type="submit" name="update" value="Izmeni sto" class="btn btn-primary btn " >
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